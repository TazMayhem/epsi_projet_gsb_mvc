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
     *      targetEntity="FicheFrais",
     *      inversedBy="lignesFraisForfait",
     *      cascade={"persist"}
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $ficheFrais;

    /**
     * @var FraisForfait
     *
     * @ORM\ManyToOne(
     *      targetEntity="FraisForfait",
     *      inversedBy="lignesFraisForfait"
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $fraisForfait;

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
     * Set ficheFrais
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais $ficheFrais
     * @return LigneFraisForfait
     */
    public function setFicheFrais(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais $ficheFrais)
    {
        $this->ficheFrais = $ficheFrais;

        return $this;
    }

    /**
     * Get ficheFrais
     *
     * @return \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais 
     */
    public function getFicheFrais()
    {
        return $this->ficheFrais;
    }

    /**
     * Set fraisForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FraisForfait $fraisForfait
     * @return LigneFraisForfait
     */
    public function setFraisForfait(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FraisForfait $fraisForfait)
    {
        $this->fraisForfait = $fraisForfait;

        return $this;
    }

    /**
     * Get fraisForfait
     *
     * @return \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FraisForfait 
     */
    public function getFraisForfait()
    {
        return $this->fraisForfait;
    }
}
