<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder
            ->add('prenom', TextType::class,[
                'attr' =>[ 
                    'placeholder' => "Firstname",
                    'class' => 'input is-warning'
                ]
            ])

            ->add('nom' , TextType::class,[
                'attr' =>[ 
                    'placeholder' => "username",
                    'class' => 'input is-warning'
                ]
            ])
            ->add('age' , BirthdayType::class, [
                'widget' => 'choice',
                'label' =>'Date',
            ])
 
            ->add('phone', TelType::class,[
                'label' =>'Phone',
                ])
                
            ->add('email', EmailType::class,[
                'attr'  =>[
                'placeholder' => 'Email',
                'class' => 'input is-warning'
                ]
            ])
            ->add('password', RepeatedType::class,[
                'type' =>PasswordType::class,
                'invalid_message' => 'vos mots de passes ne sont pas identiques !',
                'first_options' =>[
                    'label' => 'mot de passe ',
                    'attr' => [
                        "placeholder" =>"mot de passe",
                        'class' => 'input is-warning'

                    ]
                    ],
                'second_options' =>[
                    'label' => 'repeter mot de passe ',
                    'attr' => [
                    
                        "placeholder" =>"repeter le mot de passe",
                        'class' => 'input is-warning'
                        
                    ]
                ]
            ]) 
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'button is-warning'
                    
                ]
            ])       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
