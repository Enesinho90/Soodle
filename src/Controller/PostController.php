<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PostController extends AbstractController
{
    #[Route('post/{id_post}/{id_ue}/delete', name: 'app_post_delete', methods: ['POST'])]
    public function index(
        int $id_post,
        int $id_ue,
        PostRepository $postRepository,
        EntityManagerInterface $entityManager,
        Request $request
    ): RedirectResponse {
        // Vérification du token CSRF pour sécuriser la suppression
        $token_recu = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('delete' . $id_post, $token_recu)) {
            throw $this->createAccessDeniedException();
        }

        // Vérifie que l'utilisateur a bien le rôle PROF
        $this->denyAccessUnlessGranted('ROLE_PROF');

        // Récupération du post à supprimer
        $post = $postRepository->find($id_post);
        if (!$post) {
            throw $this->createNotFoundException("Post introuvable.");
        }

        // Si le post est de type "partage de fichier", on supprime également le fichier associé
        if ($post->isType()) {
            $fichier = $post->getFichier();
            $codeUE = $post->getUniteEnseignement()->getCode();

            if ($fichier) {
                $cheminComplet = $this->getParameter('kernel.project_dir') . '/public/files/' . $codeUE . '/' . $fichier;
                if (file_exists($cheminComplet)) {
                    unlink($cheminComplet); // Suppression du fichier sur le disque
                }
            }
        }

        // Suppression du post dans la base de données
        $entityManager->remove($post);
        $entityManager->flush();

        // Redirection vers la page de l'UE après suppression
        return $this->redirectToRoute('app_page_contenue_ue', ['id' => $id_ue]);
    }
}
