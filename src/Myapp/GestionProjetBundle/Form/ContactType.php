<?php
namespace Myapp\GestionProjetBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder->add('nom', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'Nom')))
                ->add('email', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'mail')))
                ->add('objet', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'objet')))
                ->add('sujet',TextareaType::class,array('required'=>true, 'attr'=> array('placeholder'=>'Sujet')));  
        
        
        
           }
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Myapp\GestionProjetBundle\Entity\Contact'
        ));
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'contact';
    }
}
