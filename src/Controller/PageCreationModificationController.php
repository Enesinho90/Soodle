<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\UniteEnseignement;
use App\Form\PostType;
use App\Repository\PostRepository;
use App\Repository\UniteEnseignementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageCreationModificationController extends AbstractController
{
    #[Route('/page_creation_modification/{id}', name: 'app_page_creation_modification')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        int $id,
        UniteEnseignementRepository $uniteEnseignementRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PROF');

        // Récupération de l’UE
        $uniteEnseignement = $uniteEnseignementRepository->find($id);
        if (!$uniteEnseignement) {
            throw $this->createNotFoundException('UE non trouvée.');
        }

        // Création d’un nouveau post
        $post = new Post();
        $post->setType(0);
        $post->setDate(new \DateTime());
        $post->setUniteEnseignement($uniteEnseignement);
        $post->setUtilisateur($this->getUser());

        // Création et gestion du formulaire
        $postForm = $this->createForm(PostType::class, $post);
        $postForm->handleRequest($request);

        if ($postForm->isSubmitted() && $postForm->isValid()) {
            $type = $postForm->get('type')->getData();

            // Si c'est un partage de fichier
            if ($type == 1) {
                $file = $postForm->get('fichier')->getData();
                if ($file) {
                    $filename = $post->getTitre() . '.' . $file->getClientOriginalExtension();
                    $file->move(
                        $this->getParameter('kernel.project_dir') . '/public/files/' . $uniteEnseignement->getCode(),
                        $filename
                    );
                    $post->setFichier($filename);
                }
            } else {
                // Sinon on vide le champ fichier
                $post->setFichier(null);
            }

            // Finalisation des données
            $post->setType($type);
            $post->setDate(new \DateTime());
            $post->setUtilisateur($this->getUser());

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('app_page_contenue_ue', ['id' => $id]);
        }

        // Affichage du formulaire
        return $this->render('page_creation_modification/index.html.twig', [
            'controller_name' => 'PageCreationModificationController',
            'postForm' => $postForm->createView(),
            'id_ue' => $id
        ]);
    }


    #[Route('/page_creation_modification/{id_ue}/{id_post}', name: 'app_page_modification')]
    public function modification_post(
        Request $request,
        EntityManagerInterface $entityManager,
        int $id_ue,
        int $id_post,
        UniteEnseignementRepository $uniteEnseignementRepository,
        PostRepository $postRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_PROF');

        // Récupération de l’UE
        $uniteEnseignement = $uniteEnseignementRepository->find($id_ue);
        if (!$uniteEnseignement) {
            throw $this->createNotFoundException('UE non trouvée.');
        }

        // Récupération du post à modifier
        $post = $postRepository->find($id_post);

        // Création et gestion du formulaire
        $postForm = $this->createForm(PostType::class, $post);
        $postForm->handleRequest($request);

        if ($postForm->isSubmitted() && $postForm->isValid()) {
            $type = $postForm->get('type')->getData();

            // Si c'est un partage de fichier
            if ($type == 1) {
                $file = $postForm->get('fichier')->getData();
                if ($file) {
                    $filename = $post->getTitre() . '.' . $file->getClientOriginalExtension();
                    $file->move(
                        $this->getParameter('kernel.project_dir') . '/public/files/' . $uniteEnseignement->getCode(),
                        $filename
                    );
                    $post->setFichier($filename);
                }
            } else {
                // Sinon on vide le champ fichier
                $post->setFichier(null);
            }

            // Mise à jour des infos
            $post->setType($type);
            $post->setDate(new \DateTime());
            $post->setUtilisateur($this->getUser());

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('app_page_contenue_ue', ['id' => $id_ue]);
        }

        // Affichage du formulaire
        return $this->render('page_creation_modification/index.html.twig', [
            'controller_name' => 'PageCreationModificationController',
            'postForm' => $postForm->createView(),
            'id_ue' => $id_ue,
        ]);
    }


}
