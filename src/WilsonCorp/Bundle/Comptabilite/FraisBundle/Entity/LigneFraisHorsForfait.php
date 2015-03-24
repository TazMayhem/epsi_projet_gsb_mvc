<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneFraisHorsForfait
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfaitRepository")
 */
class LigneFraisHorsForfait
{

    /**
     * @var FicheFrais
     *
     * @ORM\ManyToOne(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais",
     *      inversedBy="lignesFraisHorsForfait"
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $ficheFrais;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur",
     *      mappedBy="lignesFraisHorsForfait",
     *      cascade={"persist"}
     * )
     */
    private $visiteur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal")
     */
    private $montant;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100)
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
     * Set date
     *
     * @param \DateTime $date
     * @return LigneFraisHorsForfait
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set montant
     *
     * @param string $montant
     * @return LigneFraisHorsForfait
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
     * Set libelle
     *
     * @param string $libelle
     * @return LigneFraisHorsForfait
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
        $this->visiteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set ficheFrais
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais $ficheFrais
     * @return LigneFraisHorsForfait
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
     * Add visiteur
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteur
     * @return LigneFraisHorsForfait
     */
    public function addVisiteur(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur[] = $visiteur;

        return $this;
    }

    /**
     * Remove visiteur
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteur
     */
    public function removeVisiteur(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteur)
    {
        $this->visiteur->removeElement($visiteur);
    }

    /**
     * Get visiteur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisiteur()
    {
        return $this->visiteur;
    }
}
