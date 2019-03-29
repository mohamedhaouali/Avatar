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


class ChambreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateentree', DateType::class, array(
                    // render as a single text box
                    'widget' => 'single_text',
                ))
                ->add('datesortie', DateType::class, array(
                    // render as a single text box
                    'widget' => 'single_text',
                ))
                ->add('nombrechambre', IntegerType::class)
                ->add('typechambre', ChoiceType::class, array(
                    'choices' => array(
                        'Chambre standard' => array(
                            'Chambre standard' => 'Chambre standard',
                        ),
                    ),
                ))
                ->add('arrangement')
                ->add('nombreadulte', ChoiceType::class, array(
                    'choices' => array(
                        '0' => array(
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                        ),
                    ),
                ))
                ->add('nombreenfants', ChoiceType::class, array(
                    'choices' => array(
                        '0' => array(
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                        ),
                    ),
                ))
                ->add('nombrebebes', ChoiceType::class, array(
                    'choices' => array(
                        '0' => array(
                            '0' => '0',
                            '1' => '1',
                            '2' => '2',
                            '3' => '3',
                            '4' => '4',
                        ),
                    ),
        ));
    }

/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Myapp\GestionProjetBundle\Entity\Chambre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'myapp_gestionprojetbundle_chambre';
    }


}
