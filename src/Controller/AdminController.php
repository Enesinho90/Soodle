<?php

namespace App\Controller;

use App\Entity\Affectation;
use App\Entity\Post;
use App\Entity\UniteEnseignement;
use App\Entity\Utilisateur;
use App\Form\AffectationType;
use App\Form\RegistrationFormType;
use App\Form\UniteEnseignementFormType;
use App\Repository\AffectationRepository;
use App\Repository\UniteEnseignementRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(UtilisateurRepository $utilisateursRepo, UniteEnseignementRepository $coursRepo): Response
    {
        $utilisateurs = $utilisateursRepo->findAll();
        $cours = $coursRepo->findAll();

        return $this->render('admin/index.html.twig', [
            'utilisateurs' => $utilisateurs,
            'cours' => $cours,
        ]);
    }

    #[Route('/admin/delete/user/{id}', name: 'app_deleteUser', methods: ['POST'])]
    public function deleteUser(Request $request, Utilisateur $user, EntityManagerInterface $em): JsonResponse
    {
        try {
            // First, find all posts by this user
            $posts = $em->getRepository(Post::class)->findBy(['utilisateur' => $user]);
            foreach ($posts as $post) {
                // Remove any files attached to posts if needed
                if ($post->getFichier()) {
                    $filesystem = new Filesystem();
                    $filePath = $this->getParameter('kernel.project_dir') . '/public/uploads/files/' . $post->getFichier();
                    if ($filesystem->exists($filePath)) {
                        try {
                            $filesystem->remove($filePath);
                        } catch (IOExceptionInterface $exception) {
                            // Just log the error but continue with deletion
                            error_log('Error deleting file: ' . $exception->getMessage());
                        }
                    }
                }
                $em->remove($post);
            }

            // Next, find all affectations for this user
            $affectations = $em->getRepository(Affectation::class)->findBy(['utilisateur' => $user]);
            foreach ($affectations as $affectation) {
                $em->remove($affectation);
            }

            // Remove the user avatar if it exists
            if ($user->getAvatar()) {
                $filesystem = new Filesystem();
                $avatarPath = $this->getParameter('kernel.project_dir') . '/public/uploads/avatar/' . $user->getAvatar();
                if ($filesystem->exists($avatarPath)) {
                    try {
                        $filesystem->remove($avatarPath);
                    } catch (IOExceptionInterface $exception) {
                        // Just log the error but continue with deletion
                        error_log('Error deleting avatar: ' . $exception->getMessage());
                    }
                }
            }

            // Finally, delete the user
            $em->remove($user);
            $em->flush();

            return new JsonResponse([
                'status' => 'success',
                'message' => 'Utilisateur et toutes ses données associées supprimés avec succès'
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    #[Route('/admin/edit/user/{id}', name: 'app_editUser')]
    public function editUser(Utilisateur $user, EntityManagerInterface $em, Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $form = $this->createForm(RegistrationFormType::class, $user, ['is_edit' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();

            if ($plainPassword) {
                $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
                $user->setPassword($hashedPassword);
            }

            $roleChoice = $form->get('roleChoice')->getData();

            switch ($roleChoice) {
                case 'admin':
                    $user->setRoles(['ROLE_ADMIN']);
                    break;
                case 'prof':
                    $user->setRoles(['ROLE_PROF']);
                    break;
                case 'etudiant':
                    $user->setRoles(['ROLE_ETUDIANT']);
                    break;
                case 'admin_prof':
                    $user->setRoles(['ROLE_PROF', 'ROLE_ADMIN']);
                    break;
            }

            $em->flush();

            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/edit_user.html.twig', [
            'form' => $form,
            'user' => $user,
        ]);
    }

    #[Route('/admin/delete/ue/{id}', name: 'app_deleteUE', methods: ['POST'])]
    public function deleteUE(UniteEnseignement $ue, EntityManagerInterface $em): JsonResponse
    {
        $filesystem = new Filesystem();
        $imagePath = $this->getParameter('kernel.project_dir') . '/public/' . $ue->getImage();

        if ($ue->getImage() && $filesystem->exists($imagePath)) {
            try {
                $filesystem->remove($imagePath);
            } catch (IOExceptionInterface $exception) {
                return new JsonResponse(['status' => 'error', 'message' => 'Erreur lors de la suppression de l\'image.'], 400);
            }
        }

        $em->remove($ue);
        $em->flush();

        return new JsonResponse(['status' => 'success', 'message' => 'Unité d\'enseignement supprimée avec succès']);
    }


    #[Route('/admin/edit/ue/{id}', name: 'app_editUE')]
    public function editUE(UniteEnseignement $ue, EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(UniteEnseignementFormType::class, $ue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            // Si une image est uploadée
            if ($imageFile) {
                $code = $ue->getCode(); // on récupère le code de l'UE

                // On devine l'extension du fichier (ex: jpg, png...)
                $extension = $imageFile->guessExtension();
                if (!$extension) {
                    $extension = 'bin';
                }

                // Nouveau nom de fichier basé sur le code
                $newFilename = $code . '.' . $extension;

                // On déplace le fichier dans le dossier public/uploads/images
                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );

                // On stocke juste le nom de fichier dans l'objet
                $ue->setImage($newFilename);
            }

            // Puis on enregistre dans la BDD
            $entityManager->persist($ue);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin');
        }

        return $this->render('admin/edit_ue.html.twig', [
            'UEForm' => $form,
        ]);
    }
    #[Route('/admin/affectation/{id}', name: 'app_affecter')]
public function affecter(Utilisateur $user,AffectationRepository $affectationRepository, EntityManagerInterface $entityManager, Request $request): Response
{
    $affectation = new Affectation();
    $affectation->setUtilisateur($user);

    $form = $this->createForm(AffectationType::class, $affectation);
    $form->handleRequest($request);

    $cours = $affectationRepository->findUEByUserId($user->getId());
    // Transformer $cours (Affectation[]) en $ues (UniteEnseignement[])
    $ues = array_map(function ($affectation) {
        return $affectation->getUniteEnseignement();
    }, $cours);

    if ($form->isSubmitted() && $form->isValid()) {
        $uniteEnseignement = $form->get('uniteEnseignement')->getData();

        $existingAffectation = $entityManager->getRepository(Affectation::class)
            ->findOneBy([
                'utilisateur' => $user,
                'uniteEnseignement' => $uniteEnseignement,
            ]);

        if ($existingAffectation) {
            // Si l'affectation existe, on la supprime
            $entityManager->remove($existingAffectation);
            $entityManager->flush();
            $this->addFlash('success', 'UE supprimée avec succès.');
        } else {
            // Sinon, on l'ajoute
            $affectation->setUniteEnseignement($uniteEnseignement);
            $affectation->setDateInscription(new \DateTimeImmutable());

            $entityManager->persist($affectation);
            $entityManager->flush();
            $this->addFlash('success', 'UE ajoutée avec succès.');
        }

        return $this->redirectToRoute('app_affecter', ['id' => $user->getId()]);
    }

    $codesUEString=[];
    foreach($ues as $ue){
        $codesUEString[] = $ue->getCode();
    }

    $idUEString=[];
    foreach($ues as $ue){
        $idUEString[] = $ue->getId();
    }




    return $this->render('admin/affectation.html.twig', [
        'AffectationForm' => $form->createView(),
        'user' => $user,
        'idUEString' => $idUEString,
        'codesUESring' => $codesUEString,
    ]);
}

}
