<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LigneFraisForfaitType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mois')
            ->add('idFraisForfait')
            ->add('quantite')
            ->add('ficheFrais')
            ->add('visiteur')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wilsoncorp_bundle_comptabilite_fraisbundle_lignefraisforfait';
    }
}
