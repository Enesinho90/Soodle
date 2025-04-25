<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\UniteEnseignement;
use App\Entity\Utilisateur;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

//post_type
class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class,[
                'attr' => [
                    'class' => 'title-input',
                    'placeholder' => 'TD1 - Validation/Remise à Niveau'
                ],
                'label_attr' => [
                    'class' => 'title-input'
                ]
            ])
            ->add('fichier',FileType::class,[
                'mapped' => false,
                'required' => false,
                'label_attr' => [
                    'class' => 'file-input'
                ],
                'attr' => [
                    'class' => 'file-input',
                ],
                'constraints' => [
                    new File()
                ]
                //ne pas oublier de mettre la coutrainte!
            ])
            ->add('contenu',TextareaType::class,[
                'attr' => [
                    'placeholder' => 'Entrez le contenu du message',
                ]
            ])
            ->add('type',HiddenType::class,[
                'mapped'=>false,
            ]);


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
