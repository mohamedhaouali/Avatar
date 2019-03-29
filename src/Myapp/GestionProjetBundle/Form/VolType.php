<?php

namespace Myapp\GestionProjetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;



class VolType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('typevol', ChoiceType::class, [
                    'choices' => ['Aller Simple' => true, 'Aller/Retour' => false],
                ])
                ->add('datedepart', DateType::class, array(
                    // render as a single text box
                    'widget' => 'single_text',
                ))
                ->add('civilite')
                ->add('prenom', TextType::class, array('required' => true, 'attr' => array('placeholder' => 'Prénom')))
                ->add('nom', TextType::class, array('required' => true, 'attr' => array('placeholder' => 'Nom')))
                ->add('email', EmailType::class, array('attr' => array('placeholder' => 'Your email address'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Please provide a valid email")),
                        new Email(array("message" => "Your email doesn't seems to be valid")),
            )))
                ->add('telephone', NumberType::class)
                ->add('aeroportdedepart', TextType::class, array('required' => true, 'attr' => array('placeholder' => 'Ville/Aéroport de départ')))
                ->add('aeroportdarrive', TextType::class, array('required' => true, 'attr' => array('placeholder' => 'Ville/Aéroport arrive')))
                ->add('nombreadultes', IntegerType::class)
                ->add('nombreenfant', IntegerType::class)
                ->add('nombrebebes', IntegerType::class)
                ->add('observation', TextareaType::class, array('required' => true, 'attr' => array('placeholder' => 'Observation')))
                ->add('classe', EntityType::class, array(
                    // query choices from this entity
                    'class' => 'GestionProjetBundle:Classe',
                    // use the User.username property as the visible option string
                    'choice_label' => 'classe',
                    'multiple' => false, 'expanded' => false // options will be presented in a <select> element; set this to true, to present the data as checkboxes
                        )
                )
                ->add('civilite', EntityType::class, array(
                    // query choices from this entity
                    'class' => 'GestionProjetBundle:Civilite',
                    // use the User.username property as the visible option string
                    'choice_label' => 'civilite',
                    'multiple' => false, 'expanded' => false // options will be presented in a <select> element; set this to true, to present the data as checkboxes
                        )
                )
        ;
    }

    /**
      /**
     * {@inheritdoc}
     */

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Myapp\GestionProjetBundle\Entity\Vol'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'myapp_gestionprojetbundle_vol';
    }

}
