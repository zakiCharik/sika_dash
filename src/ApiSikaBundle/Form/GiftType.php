<?php

namespace ApiSikaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GiftType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('value', TextType::class, [
            'label' => 'Valeur en points',
            'attr' => ['class' => 'form-control ','required'=>"required"],
        ])
        ->add('name', TextType::class, [
            'label' => 'Titre de la Récompense',
            'attr' => ['class' => 'form-control ','required'=>"required"],
        ])
        ->add('qt', TextType::class, [
            'label' => 'Quantité disponible',
            'attr' => ['class' => 'form-control ','required'=>"required"],
        ])
        // ->add('logo')
        // ->add('createdTime')
        // ->add('modifiedTime')
        // ->add('createdBy')
        ->add('description', TextareaType::class, [
            'label' => 'Description de la Récompense',
            'attr' => ['class' => 'form-control ','required'=>"required"],
        ])
        ->add('pathLogo',FileType::class, [
            'label' => 'Uploader un fichier de la Récompense',
            'attr' => ['class' => 'file','required'=>"required"],
        ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApiSikaBundle\Entity\Gift'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'apisikabundle_gift';
    }


}
