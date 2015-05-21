<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Tests\Fixtures\Entity;

class VisiteurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('ville')
            ->add('cp')
            ->add('username')
            ->add('password')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wilsoncorp_bundle_comptabilite_fraisbundle_visiteur';
    }
}
