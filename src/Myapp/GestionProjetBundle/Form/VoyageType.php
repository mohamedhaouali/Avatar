<?php

namespace Myapp\GestionProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class VoyageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('titre', TextType::class, array('required' => true, 'attr' => array('placeholder' => 'Nom Voyage')))
                ->add('datedevoyage', TextType::class, array('required' => true, 'attr' => array('placeholder' => 'Date de voyage')))
                ->add('prix', MoneyType::class,array('required'=>true, 'attr'=> array('placeholder'=>'prix du produit')))
                ->add('file', FileType::class)
                 ->add('path1');  
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Myapp\GestionProjetBundle\Entity\Voyage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_gestionprojetbundle_voyage';
    }


}
