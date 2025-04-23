<?php

namespace App\DataFixtures;

use App\Entity\Affectation;
use App\Entity\Post;
use App\Entity\UniteEnseignement;
use App\Entity\User;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        //creation de l'utilisteur admin
        $userAdmin = new Utilisateur();
        $userAdmin->setEmail('admin@admin.com');
        $userAdmin->setRoles(['ROLE_ADMIN']);
        $userAdmin->setNom('Admin');
        $userAdmin->setPrenom('Admin');
        $hashedPassword = $this->passwordHasher->hashPassword($userAdmin, 'admin123');
        $userAdmin->setPassword($hashedPassword);
        $manager->persist($userAdmin);

        //creation du Professeur
        $userProf = new Utilisateur();
        $userProf->setEmail('prof@prof.com');
        $userProf->setRoles(['ROLE_PROF']);
        $userProf->setNom('Prof');
        $userProf->setPrenom('Prof');
        $hashedPassword = $this->passwordHasher->hashPassword($userProf, 'prof123');
        $userProf->setPassword($hashedPassword);
        $manager->persist($userProf);

        //creation de l'étudiant
        $userEtudiant = new Utilisateur();
        $userEtudiant->setEmail('etudiant@etudiant.com');
        $userEtudiant->setRoles(['ROLE_ETUDIANT']);
        $userEtudiant->setNom('Etudiant');
        $userEtudiant->setPrenom('Etudiant');
        $hashedPassword = $this->passwordHasher->hashPassword($userEtudiant, 'etudiant123');
        $userEtudiant->setPassword($hashedPassword);
        $manager->persist($userEtudiant);

        //creation des UE
        $uniteEnseignement_1 = new UniteEnseignement();
        $uniteEnseignement_1->setCode('WE4A');
        $uniteEnseignement_1->setIntitulé("Développement Web");
        $manager->persist($uniteEnseignement_1);

        $uniteEnseignement_2 = new UniteEnseignement();
        $uniteEnseignement_2->setCode('SI40');
        $uniteEnseignement_2->setIntitulé("Systèmes d'information");
        $manager->persist($uniteEnseignement_2);



        //creation de post
        $post = new Post();
        $post->setTitre("Bienvenue dans le cours");
        $post->setContenu("Ce cours va couvrir Symfony.");
        $post->setDate(new \DateTime());
        $post->setType(false); // false = texte
        $post->setUtilisateur($userProf);
        $post->setUniteEnseignement($uniteEnseignement_1);
        $manager->persist($post);

        //creation de post
        $post_2 = new Post();
        $post_2->setTitre("Pas bienvenue");
        $post_2->setContenu("Ce cours va couvrir JAVASCRIPT.");
        $post_2->setDate(new \DateTime());
        $post_2->setType(false); // false = texte
        $post_2->setUtilisateur($userProf);
        $post_2->setUniteEnseignement($uniteEnseignement_1);
        $manager->persist($post_2);

        //creation affectation
        $affectationProf = new Affectation();
        $affectationProf->setUtilisateur($userProf);
        $affectationProf->setUniteEnseignement($uniteEnseignement_1);
        $affectationProf->setDateInscription(new \DateTime());
        $manager->persist($affectationProf);


        $affectationEtudiant = new Affectation();
        $affectationEtudiant->setUtilisateur($userEtudiant);
        $affectationEtudiant->setUniteEnseignement($uniteEnseignement_1);
        $affectationEtudiant->setDateInscription(new \DateTime());
        $manager->persist($affectationEtudiant);

        $manager->flush();
    }
}
