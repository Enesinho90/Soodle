<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ChangerMdpController extends AbstractController
{
    #[Route('/changer_mdp', name: 'app_changer_mdp')]
    public function index(): Response
    {
        return $this->render('changer_mdp/index.html.twig', [
            'controller_name' => 'ChangerMdpController',
        ]);
    }
}
