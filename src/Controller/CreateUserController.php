<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CreateUserController extends AbstractController
{
    #[Route('/createUser', name: 'app_createUser')]
    public function index(): Response
    {
        return $this->render('create_user/index.html.twig', [
            'controller_name' => 'CreateUserController',
        ]);
    }
}
