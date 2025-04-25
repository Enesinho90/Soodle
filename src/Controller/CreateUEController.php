<?php

namespace App\Controller;

use App\Entity\UniteEnseignement;
use App\Form\UniteEnseignementFormType;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

final class CreateUEController extends AbstractController
{

    #[Route('/admin/ue/create', name: 'app_createUE')]
    public function index(Request $request, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $ue = new UniteEnseignement();
        $form = $this->createForm(UniteEnseignementFormType::class, $ue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            // Si une image est uploadée
            if ($imageFile) {
                $code = $ue->getCode(); // on récupère le code de l'UE

                // On devine l'extension du fichier (ex: jpg, png...)
                $extension = $imageFile->guessExtension();
                if (!$extension) {
                    $extension = 'bin';
                }

                // Nouveau nom de fichier basé sur le code
                $newFilename = $code . '.' . $extension;

                // On déplace le fichier dans le dossier public/uploads/images
                $imageFile->move(
                    $this->getParameter('uploads_directory'),
                    $newFilename
                );

                // On stocke juste le nom de fichier dans l'objet
                $ue->setImage($newFilename);
            }

            // Puis on enregistre dans la BDD
            $entityManager->persist($ue);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin');
        }

        return $this->render('create_ue/index.html.twig', [
            'UEForm' => $form,
        ]);
    }
}
