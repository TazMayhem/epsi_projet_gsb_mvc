<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LigneFraisHorsForfaitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('montant')
            ->add('libelle')
            ->add('ficheFrais')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wilsoncorp_bundle_comptabilite_fraisbundle_lignefraishorsforfait';
    }
}
