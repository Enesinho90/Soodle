<?php

namespace App\Controller;

use App\Entity\Affectation;
use App\Repository\AffectationRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CoursController extends AbstractController
{
    #[Route('/cours', name: 'app_cours')]
    public function index(AffectationRepository $affectationRepository, PostRepository $postRepository): Response
    {
        $user = $this->getUser();
        $affectations = $affectationRepository->findBy(['utilisateur' => $user]);

        $cours = [];
        foreach ($affectations as $affectation) {
            $cours[] = $affectation->getUniteEnseignement();
        }

        $actualites = $postRepository->findPostsForUnitesEnseignement($cours);

        return $this->render('cours/index.html.twig', [
            'cours' => $cours,
            'actualites' => $actualites,
        ]);
    }


}
