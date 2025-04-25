<?php

namespace App\Controller;

use App\Entity\UniteEnseignement;
use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use App\Form\UniteEnseignementFormType;
use App\Repository\UniteEnseignementRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
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
    public function deleteUser(Utilisateur $user, EntityManagerInterface $em): RedirectResponse
    {
        $em->remove($user);
        $em->flush();

        return $this->redirectToRoute('app_admin');
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
    public function deleteUE(UniteEnseignement $ue, EntityManagerInterface $em): RedirectResponse
    {
        $filesystem = new Filesystem();
        $imagePath = $this->getParameter('kernel.project_dir') . '/public/' . $ue->getImage();

        if ($ue->getImage() && $filesystem->exists($imagePath)) {
            try {
                $filesystem->remove($imagePath);
            } catch (IOExceptionInterface $exception) {
                $this->addFlash('error', 'Erreur lors de la suppression de l\'image.');
            }
        }

        $em->remove($ue);
        $em->flush();

        return $this->redirectToRoute('app_admin');
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
}
