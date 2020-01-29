<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class,[
                'attr' =>[ 
                    'placeholder' => "Firstname",
                
                ]
            ])

            ->add('username' , TextType::class,[
                'attr' =>[ 
                    'placeholder' => "username",
                
                ]
            ])
            ->add('age' , BirthdayType::class, [
                'widget' => 'choice',
                'label' =>'Date'
            ])

            ->add('phone', TelType::class,[
                'label' =>'Phone'
                ])
                
            ->add('email', EmailType::class,[
                'attr'  =>[
                'placeholder' => 'Email'
                ]
            ])
            ->add('password')
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
