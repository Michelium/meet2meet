<?php

namespace App\Form;

use App\Entity\Country;
use App\Entity\Language;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProfileType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('birthdate', DateType::class, [
                'label' => false,
                'format' => 'dd MM yyyy',
                'years' => range(date('Y') - 80, date('Y') - 10),
                'required' => false,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Gender',
                'choices' => [
                    'Male' => 'M',
                    'Female' => 'F',
                    'Other' => 'X',
                ],
                'required' => false,
            ])
            ->add('avatarFile', FileType::class, [
                'label' => false,
                'required' => false,
                'mapped' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '16384k',
                        'maxSizeMessage' => 'File is too large {{ size }} {{ suffix }}. Maximum size: {{ size }} {{ suffix }}.',
                        'mimeTypes' => [
                            'image/png',
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'Type is invalid! Valid types: {{ types }}.'
                    ])
                ]
            ])
            ->add('education', TextType::class, [
                'label' => 'Current education',
                'required' => false,
            ])
            ->add('status', TextType::class, [
                'label' => 'Current status',
                'required' => false,
            ])
            ->add('about', TextareaType::class, [
                'label' => 'About you (your general interests, people you are looking for or even your opinion about climate change)',
                'required' => false,
            ])
            ->add('hobbies', TextareaType::class, [
                'label' => 'Your hobbies or other interests',
                'required' => false,
            ])
            ->add('music', TextareaType::class, [
                'label' => 'What music are you listening to, or maybe you are creating music. Tell everyone!',
                'required' => false,
            ])
            ->add('movies', TextareaType::class, [
                'label' => 'Your favourite movies now or maybe as a child',
                'required' => false,
            ])
            ->add('tv_shows', TextareaType::class, [
                'label' => 'Your favourite TV shows',
                'required' => false,
            ])
            ->add('books', TextareaType::class, [
                'label' => 'Tell the world about your favourte books, maybe you will give someone else reading ideas!',
                'required' => false,
            ])
            ->add('home_country', EntityType::class, [
                'label' => 'Your home country (this is the country you were born in or feel home in the most)',
                'required' => false,
                'class' => Country::class,
                'choice_label' => 'name',
            ])
            ->add('current_country', EntityType::class, [
                'label' => 'Your current country (this is the country you are currently living in)',
                'required' => false,
                'class' => Country::class,
                'choice_label' => 'name',
            ])
            ->add('languages', EntityType::class, [
                'label' => 'Languages you speak',
                'mapped' => false,
                'required' => false,
                'class' => Language::class,
                'choice_label' => 'name',
                'multiple' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
