<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class CreateUserController extends AbstractController
{
    #[Route('/admin/create/user', name: 'app_createUser')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var string $plainPassword */
            $plainPassword = $form->get('plainPassword')->getData();

            // encode the plain password
            $user->setPassword($userPasswordHasher->hashPassword($user, $plainPassword));

            $roleChoice = $form->get('roleChoice')->getData();

            switch ($roleChoice) {
                case 'admin':
                    $user->setRoles(['ROLE_ADMIN']);
                    break;
                case 'prof':
                    $user->setRoles(['ROLE_PROF']);
                    break;
                case 'etudiant':
                    $user->setRoles(['ROLE_ETUDIANT']);
                    break;
                case 'admin_prof':
                    $user->setRoles(['ROLE_PROF','ROLE_ADMIN']);
                    break;
            }
            $user->setAvatar('default.png');
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $this->redirectToRoute('app_admin');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }
}
