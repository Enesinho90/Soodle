<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ModificationProfilController extends AbstractController
{
    #[Route('/modification_profil', name: 'app_modification_profil')]
    public function index(): Response
    {
        return $this->render('modification_profil/index.html.twig', [
            'controller_name' => 'ModificationProfilController',
        ]);
    }
}
