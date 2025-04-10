<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageCreationModificationController extends AbstractController
{
    #[Route('/page_creation_modification', name: 'app_page_creation_modification')]
    public function index(): Response
    {
        return $this->render('page_creation_modification/index.html.twig', [
            'controller_name' => 'PageCreationModificationController',
        ]);
    }
}
