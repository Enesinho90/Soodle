<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CreateUEController extends AbstractController
{
    #[Route('/createUE', name: 'app_createUE')]
    public function index(): Response
    {
        return $this->render('create_ue/index.html.twig', [
            'controller_name' => 'CreateUEController',
        ]);
    }
}
