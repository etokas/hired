<?php

namespace App\Form;

use App\Entity\Job;
use App\Entity\Tag;
use App\Entity\Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tags', EntityType::class, [
                'multiple' => true,
                'class' => Tag::class,
                'choice_label' => 'name'
            ])
            ->add('title', TextType::class, [
                'attr' => [
                    'placeholder' => "L'intitulé de votre offre",
                    'autocomplete' => 'off'
                ]
            ])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'editor'
                ]
            ])
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'name',
                'expanded' => true
            ])
            ->add('additionalDescription', TextareaType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'editor'
                ]
            ])
            ->add('localisation')
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'html5' => false
            ])
            ->add('company', CompanyType::class)
            ->add('jobLink', TextType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => 'Lien vers l\'offre',
                    'autocomplete' => 'off'
                ]
            ])
            ->add('teleworking', CheckboxType::class, [
                'label' => 'Possibilité de télétravail',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Job::class,
            'csrf_protection' => false,
        ]);
    }

}
