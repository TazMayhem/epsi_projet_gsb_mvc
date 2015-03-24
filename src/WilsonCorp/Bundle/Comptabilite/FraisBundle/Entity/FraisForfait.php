<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FraisForfait
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FraisForfaitRepository")
 */
class FraisForfait
{
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="LigneFraisForfait",
     *      mappedBy="fraisForfait",
     *      cascade={"persist"}
     * )
     */
    private $lignesFraisForfait;

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
     * @ORM\Column(name="libelle", type="string", length=20)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal")
     */
    private $montant;


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
     * @return FraisForfait
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
     * Set montant
     *
     * @param string $montant
     * @return FraisForfait
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignesFraisForfait = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add lignesFraisForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait $lignesFraisForfait
     * @return FraisForfait
     */
    public function addLignesFraisForfait(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait $lignesFraisForfait)
    {
        $this->lignesFraisForfait[] = $lignesFraisForfait;

        return $this;
    }

    /**
     * Remove lignesFraisForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait $lignesFraisForfait
     */
    public function removeLignesFraisForfait(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait $lignesFraisForfait)
    {
        $this->lignesFraisForfait->removeElement($lignesFraisForfait);
    }

    /**
     * Get lignesFraisForfait
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLignesFraisForfait()
    {
        return $this->lignesFraisForfait;
    }
}
