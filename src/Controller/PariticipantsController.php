<?php

namespace App\Controller;

use App\Entity\Affectation;
use App\Entity\UniteEnseignement;
use App\Repository\AffectationRepository;
use App\Repository\UniteEnseignementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PariticipantsController extends AbstractController
{
    #[Route('page_contenue_ue/pariticipants/{id}', name: 'app_pariticipants')]
    public function index(UniteEnseignement $ue, AffectationRepository $affectationRepository): Response
    {
        // Récupérer les affectations pour l'UE spécifiée par l'ID
        $affectations = $affectationRepository->findByUEId($ue->getId());

        // Extraire les utilisateurs associés à ces affectations
        $users = [];
        foreach ($affectations as $affectation) {
            $users[] = $affectation->getUtilisateur(); // Récupérer l'utilisateur lié à chaque affectation
        }

        return $this->render('pariticipants/index.html.twig', [
            'users' => $users,
            'ue' => $ue
        ]);
    }
}
