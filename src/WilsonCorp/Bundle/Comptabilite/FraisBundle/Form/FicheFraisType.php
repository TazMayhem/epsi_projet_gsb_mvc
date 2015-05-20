<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FicheFraisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mois')
            ->add('nbJustificatifs')
            ->add('montantValide')
            ->add('dateModif')
            ->add('visiteur')
            ->add('etat')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wilsoncorp_bundle_comptabilite_fraisbundle_fichefrais';
    }
}
