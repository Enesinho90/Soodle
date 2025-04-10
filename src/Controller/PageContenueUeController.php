<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageContenueUeController extends AbstractController
{
    #[Route('/page_contenue_ue', name: 'app_page_contenue_ue')]
    public function index(): Response
    {
        return $this->render('page_contenue_ue/index.html.twig', [
            'controller_name' => 'PageContenueUeController',
        ]);
    }
}
