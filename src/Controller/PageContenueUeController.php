<?php

namespace App\Controller;

use App\Repository\AffectationRepository;
use App\Repository\PostRepository;
use App\Repository\UniteEnseignementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageContenueUeController extends AbstractController
{
    #[Route('/page_contenue_ue/{id}', name: 'app_page_contenue_ue')]
    public function index(PostRepository $postRepository,
                          UniteEnseignementRepository $uniteEnseignementRepository,
                          AffectationRepository $affectationRepository,
                          int $id): Response
    {
        $user = $this->getUser();
        $uniteEnseignement = $uniteEnseignementRepository->find($id);

        if (!$uniteEnseignement) {
            throw $this->createNotFoundException('UE non trouvée');
        }
        $affectation = $affectationRepository->findOneBy([
            'utilisateur' => $user,
            'uniteEnseignement' => $uniteEnseignement
        ]);

        if (!$affectation) {
            throw new AccessDeniedException('Vous n\'avez pas accès à cette unité d\'enseignement.');
        }


        $posts = $postRepository->findPostByDesc();
        return $this->render('page_contenue_ue/index.html.twig', [
            'controller_name' => 'PageContenueUeController',
            'posts' => $posts,
            'uniteEnseignement' => $uniteEnseignement,
        ]);
    }
}
