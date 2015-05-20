<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EtatType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Etat'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wilsoncorp_bundle_comptabilite_fraisbundle_etat';
    }
}
