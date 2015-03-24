<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visiteur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\VisiteurRepository")
 */
class Visiteur
{
    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\FicheFrais",
     *      mappedBy="visiteur",
     *      cascade={"persist"}
     * )
     */
    private $fichesFrais;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait",
     *      mappedBy="visiteur",
     *      cascade={"persist"}
     * )
     */
    private $lignesFraisForfait;

    /**
     * @var LigneFraisHorsForfait
     *
     * @ORM\ManyToOne(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait",
     *      inversedBy="visiteur"
     * )
     * @ORM\JoinColumn(nullable=false)
     */
    private $lignesFraisHorsForfait;

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=255)
     */
    private $cp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmbauche", type="datetime")
     */
    private $dateEmbauche;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=20)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=20)
     */
    private $mdp;


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
     * Set nom
     *
     * @param string $nom
     * @return Visiteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Visiteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Visiteur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Visiteur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Visiteur
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set dateEmbauche
     *
     * @param \DateTime $dateEmbauche
     * @return Visiteur
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
    }

    /**
     * Get dateEmbauche
     *
     * @return \DateTime 
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Visiteur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Visiteur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
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
     * @return Visiteur
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

    /**
     * Add lignesFraisForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisForfait $lignesFraisForfait
     * @return Visiteur
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

    /**
     * Set lignesFraisHorsForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait $lignesFraisHorsForfait
     * @return Visiteur
     */
    public function setLignesFraisHorsForfait(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait $lignesFraisHorsForfait)
    {
        $this->lignesFraisHorsForfait = $lignesFraisHorsForfait;

        return $this;
    }

    /**
     * Get lignesFraisHorsForfait
     *
     * @return \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait 
     */
    public function getLignesFraisHorsForfait()
    {
        return $this->lignesFraisHorsForfait;
    }
}
