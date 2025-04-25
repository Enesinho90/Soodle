<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('email')
            ->add('roleChoice', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Etudiant' => 'etudiant',
                    'Professeur' => 'prof',
                    'Administrateur' => 'admin',
                    'Administrateur / Professeur' => 'admin_prof',
                ],
                'label' => 'Rôle',
            ]);

        $passwordConstraints = [];
        if (!$options['is_edit']) {
            $passwordConstraints = [
                new NotBlank([
                    'message' => 'Please enter a password',
                ]),
                new Length([
                    'min' => 6,
                    'minMessage' => 'Your password should be at least {{ limit }} characters',
                    'max' => 4096,
                ]),
            ];
        }

        $builder->add('plainPassword', PasswordType::class, [
            'mapped' => false,
            'required' => !$options['is_edit'],
            'attr' => ['autocomplete' => 'new-password'],
            'constraints' => $passwordConstraints,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
            'is_edit' => false, // valeur par défaut
        ]);
    }
}

