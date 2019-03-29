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


class BateauxType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
               ->add('typevol', ChoiceType::class, [
                    'choices' => ['Aller Simple' => true, 'Aller/Retour' => false],
                ])
                ->add('datedepart', DateType::class, array(
                    // render as a single text box
                    'widget' => 'single_text',
                )) 
             
                ->add('villededepart')
                ->add('villearrive')
               
                
                ->add('typecabine', ChoiceType::class, array(
                    'choices' => array(
                        'Fauteuil' => array(
                            'Fauteuil' => 'Fauteuil',
                            'Cabinet interieur' => 'Cabinet interieur',
                            'Cabinet exterieur' => 'Cabinet exterieur Hublot',
                            'Cabinet exterieur ' => 'Cabinet exterieur Fenetre',
                            'Suite ' => 'Suite',
                        ),
                      
                    ),
                ))

                
                  ->add('typevehicule', ChoiceType::class, array(
                    'choices' => array(
                        'Pas de véhicule' => array(
                            'Pas de véhicule' => 'Pas de véhicule',
                            'Voiture(Peugeot,BMW,Ford...)' => 'Voiture(Peugeot,BMW,Ford...)',
                            'Camping Cars' => 'Camping Cars',
                            'Fourgon(IVECO,LEYLAND...)' => 'Fourgon(IVECO,LEYLAND...)',
                            'MOTO de 100 CM3 ET +' => 'MOTO de 100 CM3 ET +',
                            'Side car et quad' => 'Side car et quad',
                        ),
                      
                    ),
                ))
                
                
                ->add('adulte', IntegerType::class)
                ->add('enfant', IntegerType::class)
                ->add('bebe', IntegerType::class)
                ->add('nourissons', IntegerType::class)
                ->add('seniors', IntegerType::class)
                ->add('civilite')
                ->add('prenom', TextType::class)
                ->add('nom', TextType::class)
                ->add('email', EmailType::class, array('attr' => array('placeholder' => 'Your email address'),
                    'constraints' => array(
                        new NotBlank(array("message" => "Please provide a valid email")),
                        new Email(array("message" => "Your email doesn't seems to be valid")),
            )))
              
                ->add('telephone', NumberType::class)
                ->add('observation', TextareaType::class, array('required' => true, 'attr' => array('placeholder' => 'Observation')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Myapp\GestionProjetBundle\Entity\Bateaux'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_gestionprojetbundle_bateaux';
    }


}
