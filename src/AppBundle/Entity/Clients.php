<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Clients
 *
 * @ORM\Table(name="clients")
 * @UniqueEntity("tel")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClientsRepository")
 */
class Clients
{
    /**
     * @var int
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
     * @ORM\Column(name="tel", type="string", length=255, unique=true)
     */
    private $tel;

    /**
     * @var \string
     *
     * @ORM\Column(name="date", type="string")
     */
    private $date;

    /**
     *  @ORM\OneToMany(targetEntity="Mont", mappedBy="client",cascade={"persist", "remove"})
     */
    private $monture;

    /**
     *  @ORM\OneToMany(targetEntity="Lentile", mappedBy="client",cascade={"persist", "remove"})
     */
    private $lentile;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Clients
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
     *
     * @return Clients
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
     * Set tel
     *
     * @param string $tel
     *
     * @return Clients
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Clients
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
     * Constructor
     */
    public function __construct()
    {
        $this->directories = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get directories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirectories()
    {
        return $this->directories;
    }


    /**
     * Add monture
     *
     * @param \AppBundle\Entity\Mont $monture
     *
     * @return Clients
     */
    public function addMonture(\AppBundle\Entity\Mont $monture)
    {
        $this->monture[] = $monture;

        return $this;
    }

    /**
     * Remove monture
     *
     * @param \AppBundle\Entity\Mont $monture
     */
    public function removeMonture(\AppBundle\Entity\Mont $monture)
    {
        $this->monture->removeElement($monture);
    }

    /**
     * Get monture
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMonture()
    {
        return $this->monture;
    }

    /**
     * Add avance
     *
     * @param \AppBundle\Entity\Avance $avance
     *
     * @return Clients
     */
    public function addAvance(\AppBundle\Entity\Avance $avance)
    {
        $this->avance[] = $avance;

        return $this;
    }

    /**
     * Remove avance
     *
     * @param \AppBundle\Entity\Avance $avance
     */
    public function removeAvance(\AppBundle\Entity\Avance $avance)
    {
        $this->avance->removeElement($avance);
    }

    /**
     * Get avance
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAvance()
    {
        return $this->avance;
    }

    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        return $this->nom .' '.$this->prenom;
    }




    /**
     * Add lentile
     *
     * @param \AppBundle\Entity\Lentile $lentile
     *
     * @return Clients
     */
    public function addLentile(\AppBundle\Entity\Lentile $lentile)
    {
        $this->lentile[] = $lentile;

        return $this;
    }

    /**
     * Remove lentile
     *
     * @param \AppBundle\Entity\Lentile $lentile
     */
    public function removeLentile(\AppBundle\Entity\Lentile $lentile)
    {
        $this->lentile->removeElement($lentile);
    }

    /**
     * Get lentile
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLentile()
    {
        return $this->lentile;
    }
}
