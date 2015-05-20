<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Visiteur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\VisiteurRepository")
 */
class Visiteur implements UserInterface, \Serializable
{
    /**
     * @var Poste
     *
     * @ORM\ManyToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Poste",
     *      mappedBy="visiteurs"
     * )
     */
    private $postes;


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
     * @ORM\OneToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait",
     *      mappedBy="visiteur",
     *      cascade={"persist"}
     * )
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
     * @ORM\Column(name="username", type="string", length=20)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=40)
     */
    private $password;


    /**
     * @ORM\Column(name="salt", type="string", length=255)
     */
    private $salt;


    public function eraseCredentials()
    {
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            ) = unserialize($serialized);
    }


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
     * Set username
     *
     * @param string $username
     * @return Visiteur
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Visiteur
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fichesFrais = new \Doctrine\Common\Collections\ArrayCollection();
        $this->salt = md5(uniqid(null, true));
        $this->postes = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set salt
     *
     * @param string $salt
     * @return Visiteur
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function getRoles()
    {
        return $this->postes->toArray();
    }

    /**
     * Add postes
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Poste $postes
     * @return Visiteur
     */
    public function addPoste(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Poste $postes)
    {
        $this->postes[] = $postes;

        return $this;
    }

    /**
     * Remove postes
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Poste $postes
     */
    public function removePoste(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Poste $postes)
    {
        $this->postes->removeElement($postes);
    }

    /**
     * Get postes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPostes()
    {
        return $this->postes;
    }

    /**
     * Add lignesFraisHorsForfait
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\LigneFraisHorsForfait $lignesFraisHorsForfait
     * @return Visiteur
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

    public function __toString()
    {
        return $this->username;
    }
}
