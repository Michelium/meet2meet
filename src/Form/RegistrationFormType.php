<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RegistrationFormType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email (You will use this to log in!)',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an email',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your email should be at least {{ limit }} characters',
                        'max' => 180,
                        'maxMessage' => 'Your email cannot be longer than {{ limit }} characters'
                    ]),
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Password',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('displayname', TextType::class, [
                'label' => 'Displayname (This name is so that other users can find you faster, choose wisely!)',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a displayname',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your displyname should be at least {{ limit }} characters',
                        'max' => 25,
                        'maxMessage' => 'Your displayname cannot be longer than {{ limit }} characters'
                    ]),
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'First name',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a firstname',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your firstname should be at least {{ limit }} character',
                        'max' => 30,
                        'maxMessage' => 'Your firstname cannot be longer than {{ limit }} characters'
                    ]),
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Last name',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a lastname',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Your lastname should be at least {{ limit }} character',
                        'max' => 30,
                        'maxMessage' => 'Your lastname cannot be longer than {{ limit }} characters'
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
