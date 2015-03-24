<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneFraisForfait
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfaitRepository")
 */
class LigneFraisForfait
{
    /**
     * @var FicheFrais
     *
     * @ORM\ManyToOne(
     *      targetEntity="WilsonCorpComptabiliteFraisBundle\Entity\FicheFrais",
     *      inversedBy="lignesFraisForfait"
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $ficheFrais;

    /**
     * @var FraisForfait
     *
     * @ORM\OneToMany(
     *      targetEntity="WilsonCorpComptabiliteFraisBundle\Entity\FraisForfait",
     *      mappedBy="lignesFraisForfait",
     *      cascade={"persist"}
     * )
     */
    private $fraisForfait;

    /**
     * @var Visiteur
     *
     * @ORM\ManyToOne(
     *      targetEntity="WilsonCorpComptabiliteFraisBundle\Entity\Visiteur",
     *      inversedBy="lignesFraisForfait"
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $visiteur;

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
     * @var string
     *
     * @ORM\Column(name="idFraisForfait", type="string", length=3)
     */
    private $idFraisForfait;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;


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
     * Get idFraisForfait
     *
     * @return string 
     */
    public function getIdFraisForfait()
    {
        return $this->idFraisForfait;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return LigneFraisForfait
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set mois
     *
     * @param string $mois
     * @return LigneFraisForfait
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Set idFraisForfait
     *
     * @param string $idFraisForfait
     * @return LigneFraisForfait
     */
    public function setIdFraisForfait($idFraisForfait)
    {
        $this->idFraisForfait = $idFraisForfait;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fraisForfait = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set ficheFrais
     *
     * @param \WilsonCorpComptabiliteFraisBundle\Entity\FicheFrais $ficheFrais
     * @return LigneFraisForfait
     */
    public function setFicheFrais(\WilsonCorpComptabiliteFraisBundle\Entity\FicheFrais $ficheFrais)
    {
        $this->ficheFrais = $ficheFrais;

        return $this;
    }

    /**
     * Get ficheFrais
     *
     * @return \WilsonCorpComptabiliteFraisBundle\Entity\FicheFrais 
     */
    public function getFicheFrais()
    {
        return $this->ficheFrais;
    }

    /**
     * Add fraisForfait
     *
     * @param \WilsonCorpComptabiliteFraisBundle\Entity\FraisForfait $fraisForfait
     * @return LigneFraisForfait
     */
    public function addFraisForfait(\WilsonCorpComptabiliteFraisBundle\Entity\FraisForfait $fraisForfait)
    {
        $this->fraisForfait[] = $fraisForfait;

        return $this;
    }

    /**
     * Remove fraisForfait
     *
     * @param \WilsonCorpComptabiliteFraisBundle\Entity\FraisForfait $fraisForfait
     */
    public function removeFraisForfait(\WilsonCorpComptabiliteFraisBundle\Entity\FraisForfait $fraisForfait)
    {
        $this->fraisForfait->removeElement($fraisForfait);
    }

    /**
     * Get fraisForfait
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFraisForfait()
    {
        return $this->fraisForfait;
    }

    /**
     * Set visiteur
     *
     * @param \WilsonCorpComptabiliteFraisBundle\Entity\Visiteur $visiteur
     * @return LigneFraisForfait
     */
    public function setVisiteur(\WilsonCorpComptabiliteFraisBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur = $visiteur;

        return $this;
    }

    /**
     * Get visiteur
     *
     * @return \WilsonCorpComptabiliteFraisBundle\Entity\Visiteur 
     */
    public function getVisiteur()
    {
        return $this->visiteur;
    }
}
