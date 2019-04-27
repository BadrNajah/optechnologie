<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avance
 *
 * @ORM\Table(name="avance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AvanceRepository")
 */
class Avance
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
     * @var int
     *
     * @ORM\Column(name="avance", type="integer")
     */
    private $avance;


    /**
     * @var \string
     *
     * @ORM\Column(name="date_avance", type="string")
     */
    private $dateAvance;
    

    /**
     *  @ORM\ManyToOne(targetEntity="Mont", inversedBy="avance")
     */
    private $mont;
    
    /**
     *  @ORM\ManyToOne(targetEntity="Lentile", inversedBy="avance")
     */
    private $lent;


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
     * Set idClient
     *
     * @param string $idClient
     *
     * @return Avance
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return string
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set avance
     *
     * @param integer $avance
     *
     * @return Avance
     */
    public function setAvance($avance)
    {
        $this->avance = $avance;

        return $this;
    }

    /**
     * Get avance
     *
     * @return integer
     */
    public function getAvance()
    {
        return $this->avance;
    }

    /**
     * Set dateAvance
     *
     * @param \string $dateAvance
     *
     * @return Avance
     */
    public function setDateAvance($dateAvance)
    {
        $this->dateAvance = $dateAvance;

        return $this;
    }

    /**
     * Get dateAvance
     *
     * @return \string
     */
    public function getDateAvance()
    {
        return $this->dateAvance;
    }


    /**
     * Set mont
     *
     * @param \AppBundle\Entity\Mont $mont
     *
     * @return Avance
     */
    public function setMont(\AppBundle\Entity\Mont $mont = null)
    {
        $this->mont = $mont;

        return $this;
    }

    /**
     * Get mont
     *
     * @return \AppBundle\Entity\Mont
     */
    public function getMont()
    {
        return $this->mont;
    }

    /**
     * Set lent
     *
     * @param \AppBundle\Entity\Lentile $lent
     *
     * @return Avance
     */
    public function setLent(\AppBundle\Entity\Lentile $lent = null)
    {
        $this->lent = $lent;

        return $this;
    }

    /**
     * Get lent
     *
     * @return \AppBundle\Entity\Lentile
     */
    public function getLent()
    {
        return $this->lent;
    }
}
