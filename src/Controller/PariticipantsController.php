<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PariticipantsController extends AbstractController
{
    #[Route('/pariticipants', name: 'app_pariticipants')]
    public function index(): Response
    {
        return $this->render('pariticipants/index.html.twig', [
            'controller_name' => 'PariticipantsController',
        ]);
    }
}
