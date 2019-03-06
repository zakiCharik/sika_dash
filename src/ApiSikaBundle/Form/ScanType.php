<?php

namespace ApiSikaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScanType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('qt',null, [
            'label' => 'Nombre de coupons ',
            'attr' => ['class' => 'form-control','required'=>"required"],
        ])
        // ->add('score')
        // ->add('createdTime')
        // ->add('generationTime')
        ->add('qrValue',null, [
            'label' => 'Valeur du coupons',
            'attr' => ['class' => 'form-control','required'=>"required"],
        ])
        // ->add('clientId')
        // ->add('remainingScore')
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApiSikaBundle\Entity\Scan'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'apisikabundle_scan';
    }


}
