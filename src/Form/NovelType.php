<?php

namespace App\Form;

use App\Entity\Novel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class NovelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre'
            ])
            ->add('year', NumberType::class, [
                'label' => 'Année de publication'
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Résumé'
            ])
            ->add('movie', ChoiceType::class, [
                'label' => 'Adaptation au cinéma',
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ]
            ])
            ->add('play', ChoiceType::class, [
                'label' => 'Adaptation au théâtre',
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ]
            ])
            ->add('award', TextType::class, [
                'label' => 'Récompense(s)',
                'required' => false
            ])
            ->add('quote', TextareaType::class, [
                'label' => 'Citation'
            ])
            ->add('coverFile', VichFileType::class, [
                'label' => 'Couverture',
                'required' => true,
                'allow_delete'  => false, // not mandatory, default is true
                'download_uri' => false, // not mandatory, default is true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Novel::class,
        ]);
    }
}
