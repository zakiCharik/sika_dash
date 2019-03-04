<?php

namespace ApiSikaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
    
class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login',TextType::class, [
            'label' => 'Nom d\'utilisateur'])
            // ->add('firstName',TextType::class, [
            // 'label' => 'Compte Client'])
            // ->add('lastName',TextType::class, [
            // 'label' => 'Compte Client'])
            ->add('password',PasswordType::class)
            // ->add('salt')
            // ->add('createdTime')
            // ->add('modified')
            // ->add('lastConnect')
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApiSikaBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'apisikabundle_user';
    }


}
