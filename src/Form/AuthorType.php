<?php

namespace App\Form;

use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class,[
                'label' => "Nom de l'auteur",
            ])
            ->add('description', TextareaType::class,[
                'label' => 'Description',
            ])
            ->add('nationality', TextType::class,[
                'label' => 'Nationnalite',
            ])
            // ->add('createAt')
            // ->add('updatedAt')
            ->add('submit', SubmitType::class,[
                'label' => 'Envoyer'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
            'method' => 'POST'
        ]);
    }
}
