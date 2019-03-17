<?php

namespace ApiSikaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use ApiSikaBundle\Entity\Client;

class OperationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        // ->add('createdTime')
        // ->add('modifiedTime')
        ->add('value')
        ->add('clientId' , EntityType::class, array(
                'class' => Client::class,
                // uses the User.username property as the visible option string
                'choice_label' => 'contactAdmin',
                'label' => 'Attribuer l\'opération a un client  : ',                
                )) 
        ->add('etatValidation')
        // ->add('dateValidation')
        // ->add('byValidation')
        ->add('fromDevice');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApiSikaBundle\Entity\Operation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'apisikabundle_operation';
    }


}
