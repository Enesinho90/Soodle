<?php

namespace App\Controller;

use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ModificationProfilController extends AbstractController
{
    #[Route('/modification_profil', name: 'app_modification_profil')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupère l'utilisateur actuellement connecté
        $user = $this->getUser();

        // Crée le formulaire de profil en utilisant l'utilisateur comme données initiales
        $profilForm = $this->createForm(ProfilType::class, $user);
        $profilForm->handleRequest($request);

        // Si le formulaire a été soumis et est valide
        if ($profilForm->isSubmitted() && $profilForm->isValid()) {


            // Récupère le fichier uploadé (profilPhoto)
            $file = $profilForm->get('profilPhoto')->getData();
            if ($file) {
                if ($user->getAvatar() && $user->getAvatar() !== 'default_avatar.png') {
                    $oldFilePath = $this->getParameter('kernel.project_dir') . '/public/uploads/avatar/' . $user->getAvatar();
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath); // Supprime l'ancien fichier
                    }
                }

                // Génère un nom de fichier personnalisé pour l'image
                $filename = 'profil-pic-user-' . $user->getId() . '.' . $file->getClientOriginalExtension();

                // Déplace le fichier vers le dossier public/uploads/avatar/
                $file->move(
                    $this->getParameter('kernel.project_dir') . '/public/uploads/avatar/',
                    $filename
                );

                // Met à jour l'utilisateur avec le nom du fichier image
                $user->setAvatar($filename);
            }


            // Enregistre les modifications dans la base de données
            $entityManager->flush();

            // Redirige vers la page de profil
            return $this->redirectToRoute('app_profil');
        }

        // Affiche le formulaire dans la vue
        return $this->render('modification_profil/index.html.twig', [
            'controller_name' => 'ModificationProfilController',
            'profilForm' => $profilForm->createView(),
        ]);
    }

}
