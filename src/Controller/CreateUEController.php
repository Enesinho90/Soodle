<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CreateUEController extends AbstractController
{
    #[Route('/admin/createUE', name: 'app_createUE')]
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();

        return $this->render('create_ue/index.html.twig', [
            'controller_name' => 'CreateUEController',
            'posts' => $posts,
        ]);
    }
}
