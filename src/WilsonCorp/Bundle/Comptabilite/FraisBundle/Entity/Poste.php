<?php

namespace WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Poste
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Poste implements RoleInterface
{
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
     * @ORM\Column(name="name", type="string", length=30)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=20, unique=true)
     */
    private $role;

    /**
     * @var Visiteur
     *
     * @ORM\ManyToMany(
     *      targetEntity="WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur",
     *      inversedBy="postes"
     * )
     */
    private $visiteurs;


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
     * Set name
     *
     * @param string $name
     * @return Poste
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Poste
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->visiteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add visiteurs
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteurs
     * @return Poste
     */
    public function addVisiteur(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteurs)
    {
        $this->visiteurs[] = $visiteurs;

        return $this;
    }

    /**
     * Remove visiteurs
     *
     * @param \WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteurs
     */
    public function removeVisiteur(\WilsonCorp\Bundle\Comptabilite\FraisBundle\Entity\Visiteur $visiteurs)
    {
        $this->visiteurs->removeElement($visiteurs);
    }

    /**
     * Get visiteurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVisiteurs()
    {
        return $this->visiteurs;
    }
}
