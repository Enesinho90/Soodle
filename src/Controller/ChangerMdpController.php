<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Form\FormError;

final class ChangerMdpController extends AbstractController
{
    #[Route('/changer_mdp', name: 'app_changer_mdp')]
    public function index(
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $this->getUser();

        $passwordForm = $this->createForm(ChangePasswordType::class, $user);
        $passwordForm->handleRequest($request);

        if ($passwordForm->isSubmitted() && $passwordForm->isValid()) {
            $currentPasswordForm = $passwordForm->get('currentPassword')->getData();
            $newPassword = $passwordForm->get('newPassword')->getData(); // RepeatedType => valeur finale

            if (!$passwordHasher->isPasswordValid($user, $currentPasswordForm)) {
                $passwordForm->get('currentPassword')->addError(
                    new FormError('Mot de passe actuel incorrect.')
                );
            } elseif ($passwordHasher->isPasswordValid($user, $newPassword)) {
                $passwordForm->get('newPassword')->get('first')->addError(
                    new FormError("Le nouveau mot de passe doit être différent de l'ancien.")
                );
            } else {
                $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
                $user->setPassword($hashedPassword);
                $entityManager->flush();

                return $this->redirectToRoute('app_profil');
            }
        }

        return $this->render('changer_mdp/index.html.twig', [
            'controller_name' => 'ChangerMdpController',
            'user' => $user,
            'passwordForm' => $passwordForm->createView(),
        ]);
    }
}
