<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UniteEnseignementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageContenueUeController extends AbstractController
{
    #[Route('/page_contenue_ue/{id}', name: 'app_page_contenue_ue')]
    public function index(PostRepository $postRepository,
                          int $id,UniteEnseignementRepository
                          $uniteEnseignementRepository): Response
    {
        $uniteEnseignement = $uniteEnseignementRepository->find($id);

        $posts = $postRepository->findPostByDesc();
        return $this->render('page_contenue_ue/index.html.twig', [
            'controller_name' => 'PageContenueUeController',
            'posts' => $posts,
            'uniteEnseignement' => $uniteEnseignement,
        ]);
    }
}
