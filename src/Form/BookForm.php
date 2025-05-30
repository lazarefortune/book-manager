<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\Category;
use App\Entity\User;
use App\Type\SwitchType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre du livre',
                'attr' => [
                    'class' => 'form-input',
                ]
            ])
            ->add('author', TextType::class, [
                'label' => 'Nom de l\'Auteur',
                'attr' => [
                    'class' => 'form-input',
                ]
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Résumé du livre',
                'attr' => [
                    'class' => 'form-textarea',
                ]
            ])
            ->add('publishedAt', null, [
                'widget' => 'single_text',
                'label' => 'Date de publication',
                'attr' => [
                    'class' => 'flatpickr-datetime form-input',
                ]
            ])
            ->add('isAvailable', SwitchType::class, [
                'label' => 'Disponible',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
