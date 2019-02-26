<?php

namespace ApiSikaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;


class ClientType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('userId')
        // ->add('currentScore')
        ->add('displayName',TextType::class)
        ->add('contactadmin',TextType::class)
        ->add('compteclient',TextType::class)
        ->add('scans')
        ->add('picture',FileType::class, [
            'label' => 'Uploader un fichier ',
            'attr' => ['class' => 'file','required'=>"required"],
        ])
        ->add('tel',TelType::class, [
            'label' => 'Téléphone ',
            'attr' => ['class' => 'form-control','required'=>"required", 'data-inputmask'=> "'mask' : '(999) 999-999-999'"],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Address Email',
            'attr' => ['class' => 'form-control ','required'=>"required", 'data-inputmask'=> "'mask' : '***********@***.***'"],
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ApiSikaBundle\Entity\Client'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'apisikabundle_client';
    }


}
