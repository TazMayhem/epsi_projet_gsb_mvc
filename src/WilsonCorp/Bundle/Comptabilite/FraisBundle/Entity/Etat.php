<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\EtatRepository")
 */
class Etat
{
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="FicheFrais",
     *      mappedBy="etat",
     *      cascade={"persist"}
     * )
     */
    private $fichesFrais;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=30)
     */
    private $libelle;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Etat
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fichesFrais = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fichesFrais
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais $fichesFrais
     * @return Etat
     */
    public function addFichesFrai(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais $fichesFrais)
    {
        $this->fichesFrais[] = $fichesFrais;

        return $this;
    }

    /**
     * Remove fichesFrais
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais $fichesFrais
     */
    public function removeFichesFrai(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais $fichesFrais)
    {
        $this->fichesFrais->removeElement($fichesFrais);
    }

    /**
     * Get fichesFrais
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFichesFrais()
    {
        return $this->fichesFrais;
    }
}
