<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FicheFrais
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFraisRepository")
 */
class FicheFrais
{
    /**
     * @var Visiteur
     *
     * @ORM\ManyToOne(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur",
     *      inversedBy="fichesFrais"
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $visiteur;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait",
     *      mappedBy="ficheFrais",
     *      cascade={"persist"}
     * )
     */
    private $lignesFraisHorsForfait;

    /**
     * @var Etat
     *
     * @ORM\ManyToOne(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Etat",
     *      inversedBy="fichesFrais"
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $etat;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait",
     *      mappedBy="ficheFrais",
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
    private $idVisiteur;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=6)
     */
    private $mois;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbJustificatifs", type="integer")
     */
    private $nbJustificatifs;

    /**
     * @var string
     *
     * @ORM\Column(name="montantValide", type="decimal")
     */
    private $montantValide;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="date")
     */
    private $dateModif;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getIdVisiteur()
    {
        return $this->idVisiteur;
    }

    /**
     * Get mois
     *
     * @return string 
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set nbJustificatifs
     *
     * @param integer $nbJustificatifs
     * @return FicheFrais
     */
    public function setNbJustificatifs($nbJustificatifs)
    {
        $this->nbJustificatifs = $nbJustificatifs;

        return $this;
    }

    /**
     * Get nbJustificatifs
     *
     * @return integer 
     */
    public function getNbJustificatifs()
    {
        return $this->nbJustificatifs;
    }

    /**
     * Set montantValide
     *
     * @param string $montantValide
     * @return FicheFrais
     */
    public function setMontantValide($montantValide)
    {
        $this->montantValide = $montantValide;

        return $this;
    }

    /**
     * Get montantValide
     *
     * @return string 
     */
    public function getMontantValide()
    {
        return $this->montantValide;
    }

    /**
     * Set dateModif
     *
     * @param \DateTime $dateModif
     * @return FicheFrais
     */
    public function setDateModif($dateModif)
    {
        $this->dateModif = $dateModif;

        return $this;
    }

    /**
     * Get dateModif
     *
     * @return \DateTime 
     */
    public function getDateModif()
    {
        return $this->dateModif;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lignesFraisHorsForfait = new \Doctrine\Common\Collections\ArrayCollection();
        $this->lignesFraisForfait = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set mois
     *
     * @param string $mois
     * @return FicheFrais
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Set visiteur
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteur
     * @return FicheFrais
     */
    public function setVisiteur(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * Get visiteur
     *
     * @return \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur 
     */
    public function getVisiteur()
    {
        return $this->visiteur;
    }

    /**
     * Add lignesFraisHorsForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait $lignesFraisHorsForfait
     * @return FicheFrais
     */
    public function addLignesFraisHorsForfait(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait $lignesFraisHorsForfait)
    {
        $this->lignesFraisHorsForfait[] = $lignesFraisHorsForfait;

        return $this;
    }

    /**
     * Remove lignesFraisHorsForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait $lignesFraisHorsForfait
     */
    public function removeLignesFraisHorsForfait(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait $lignesFraisHorsForfait)
    {
        $this->lignesFraisHorsForfait->removeElement($lignesFraisHorsForfait);
    }

    /**
     * Get lignesFraisHorsForfait
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLignesFraisHorsForfait()
    {
        return $this->lignesFraisHorsForfait;
    }

    /**
     * Set etat
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Etat $etat
     * @return FicheFrais
     */
    public function setEtat(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Etat $etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Etat 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Add lignesFraisForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait $lignesFraisForfait
     * @return FicheFrais
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
