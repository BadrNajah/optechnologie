<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mont
 *
 * @ORM\Table(name="mont")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MontRepository")
 */
class Mont
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
     * @ORM\Column(name="corr_od_sph", type="string", length=255)
     */
    private $corrOdSph;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_od_cyl", type="string", length=255)
     */
    private $corrOdCyl;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_od_axe", type="string", length=255)
     */
    private $corrOdAxe;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_od_eip", type="string", length=255)
     */
    private $corrOdEip;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_od_prisme", type="string", length=255)
     */
    private $corrOdPrisme;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_og_sph", type="string", length=255)
     */
    private $corrOgSph;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_og_cyl", type="string", length=255)
     */
    private $corrOgCyl;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_og_prisme", type="string", length=255)
     */
    private $corrOgPrisme;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_og_eip", type="string", length=255)
     */
    private $corrOgEip;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_og_axe", type="string", length=255)
     */
    private $corrOgAxe;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_og_add", type="string", length=255)
     */
    private $corrOgAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="corr_od_add", type="string", length=255)
     */
    private $corrOdAdd;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_mont", type="string", length=255)
     */
    private $refMont;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_verre", type="string", length=255)
     */
    private $refVerre;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_mont", type="string", length=255)
     */
    private $prixMont;

    /**
     * @var string
     *
     * @ORM\Column(name="prix_verre", type="string", length=255)
     */
    private $prixVerre;

    /**
     * @var string
     *
     * @ORM\Column(name="total_mont", type="integer" , nullable=true)
     */
    private $totalMont;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_prestation", type="string")
     */
    private $datePrestation;

    /**
     *  @ORM\ManyToOne(targetEntity="Clients", inversedBy="monture")
     */
    private $client;

    /**
     *  @ORM\OneToMany(targetEntity="Avance", mappedBy="mont",cascade={"persist", "remove"})
     */
    private $avance;

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
     * Set corrOdSph
     *
     * @param string $corrOdSph
     *
     * @return Mont
     */
    public function setCorrOdSph($corrOdSph)
    {
        $this->corrOdSph = $corrOdSph;

        return $this;
    }

    /**
     * Get corrOdSph
     *
     * @return string
     */
    public function getCorrOdSph()
    {
        return $this->corrOdSph;
    }

    /**
     * Set corrOdCyl
     *
     * @param string $corrOdCyl
     *
     * @return Mont
     */
    public function setCorrOdCyl($corrOdCyl)
    {
        $this->corrOdCyl = $corrOdCyl;

        return $this;
    }

    /**
     * Get corrOdCyl
     *
     * @return string
     */
    public function getCorrOdCyl()
    {
        return $this->corrOdCyl;
    }

    /**
     * Set corrOdAxe
     *
     * @param string $corrOdAxe
     *
     * @return Mont
     */
    public function setCorrOdAxe($corrOdAxe)
    {
        $this->corrOdAxe = $corrOdAxe;

        return $this;
    }

    /**
     * Get corrOdAxe
     *
     * @return string
     */
    public function getCorrOdAxe()
    {
        return $this->corrOdAxe;
    }

    /**
     * Set corrOdEip
     *
     * @param string $corrOdEip
     *
     * @return Mont
     */
    public function setCorrOdEip($corrOdEip)
    {
        $this->corrOdEip = $corrOdEip;

        return $this;
    }

    /**
     * Get corrOdEip
     *
     * @return string
     */
    public function getCorrOdEip()
    {
        return $this->corrOdEip;
    }

    /**
     * Set corrOdPrisme
     *
     * @param string $corrOdPrisme
     *
     * @return Mont
     */
    public function setCorrOdPrisme($corrOdPrisme)
    {
        $this->corrOdPrisme = $corrOdPrisme;

        return $this;
    }

    /**
     * Get corrOdPrisme
     *
     * @return string
     */
    public function getCorrOdPrisme()
    {
        return $this->corrOdPrisme;
    }

    /**
     * Set corrOgSph
     *
     * @param string $corrOgSph
     *
     * @return Mont
     */
    public function setCorrOgSph($corrOgSph)
    {
        $this->corrOgSph = $corrOgSph;

        return $this;
    }

    /**
     * Get corrOgSph
     *
     * @return string
     */
    public function getCorrOgSph()
    {
        return $this->corrOgSph;
    }

    /**
     * Set corrOgCyl
     *
     * @param string $corrOgCyl
     *
     * @return Mont
     */
    public function setCorrOgCyl($corrOgCyl)
    {
        $this->corrOgCyl = $corrOgCyl;

        return $this;
    }

    /**
     * Get corrOgCyl
     *
     * @return string
     */
    public function getCorrOgCyl()
    {
        return $this->corrOgCyl;
    }

    /**
     * Set corrOgPrisme
     *
     * @param string $corrOgPrisme
     *
     * @return Mont
     */
    public function setCorrOgPrisme($corrOgPrisme)
    {
        $this->corrOgPrisme = $corrOgPrisme;

        return $this;
    }

    /**
     * Get corrOgPrisme
     *
     * @return string
     */
    public function getCorrOgPrisme()
    {
        return $this->corrOgPrisme;
    }

    /**
     * Set corrOgEip
     *
     * @param string $corrOgEip
     *
     * @return Mont
     */
    public function setCorrOgEip($corrOgEip)
    {
        $this->corrOgEip = $corrOgEip;

        return $this;
    }

    /**
     * Get corrOgEip
     *
     * @return string
     */
    public function getCorrOgEip()
    {
        return $this->corrOgEip;
    }

    /**
     * Set corrOgAxe
     *
     * @param string $corrOgAxe
     *
     * @return Mont
     */
    public function setCorrOgAxe($corrOgAxe)
    {
        $this->corrOgAxe = $corrOgAxe;

        return $this;
    }

    /**
     * Get corrOgAxe
     *
     * @return string
     */
    public function getCorrOgAxe()
    {
        return $this->corrOgAxe;
    }

    /**
     * Set corrOgAdd
     *
     * @param string $corrOgAdd
     *
     * @return Mont
     */
    public function setCorrOgAdd($corrOgAdd)
    {
        $this->corrOgAdd = $corrOgAdd;

        return $this;
    }

    /**
     * Get corrOgAdd
     *
     * @return string
     */
    public function getCorrOgAdd()
    {
        return $this->corrOgAdd;
    }

    /**
     * Set corrOdAdd
     *
     * @param string $corrOdAdd
     *
     * @return Mont
     */
    public function setCorrOdAdd($corrOdAdd)
    {
        $this->corrOdAdd = $corrOdAdd;

        return $this;
    }

    /**
     * Get corrOdAdd
     *
     * @return string
     */
    public function getCorrOdAdd()
    {
        return $this->corrOdAdd;
    }

    /**
     * Set refMont
     *
     * @param string $refMont
     *
     * @return Mont
     */
    public function setRefMont($refMont)
    {
        $this->refMont = $refMont;

        return $this;
    }

    /**
     * Get refMont
     *
     * @return string
     */
    public function getRefMont()
    {
        return $this->refMont;
    }

    /**
     * Set refVerre
     *
     * @param string $refVerre
     *
     * @return Mont
     */
    public function setRefVerre($refVerre)
    {
        $this->refVerre = $refVerre;

        return $this;
    }

    /**
     * Get refVerre
     *
     * @return string
     */
    public function getRefVerre()
    {
        return $this->refVerre;
    }

    /**
     * Set prixMont
     *
     * @param string $prixMont
     *
     * @return Mont
     */
    public function setPrixMont($prixMont)
    {
        $this->prixMont = $prixMont;

        return $this;
    }

    /**
     * Get prixMont
     *
     * @return string
     */
    public function getPrixMont()
    {
        return $this->prixMont;
    }

    /**
     * Set prixVerre
     *
     * @param string $prixVerre
     *
     * @return Mont
     */
    public function setPrixVerre($prixVerre)
    {
        $this->prixVerre = $prixVerre;

        return $this;
    }

    /**
     * Get prixVerre
     *
     * @return string
     */
    public function getPrixVerre()
    {
        return $this->prixVerre;
    }

    /**
     * Set datePrestation
     *
     * @param \DateTime $datePrestation
     *
     * @return Mont
     */
    public function setDatePrestation($datePrestation)
    {
        $this->datePrestation = $datePrestation;

        return $this;
    }

    /**
     * Get datePrestation
     *
     * @return \DateTime
     */
    public function getDatePrestation()
    {
        return $this->datePrestation;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Clients $client
     *
     * @return Directory
     */
    public function setClient(\AppBundle\Entity\Clients $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \AppBundle\Entity\Clients
     */
    public function getClient()
    {
        return $this->client;
    }



    /**
     * Set totalMont
     *
     * @param string $totalMont
     *
     * @return Mont
     */
    public function setTotalMont($totalMont)
    {
        $this->totalMont = $totalMont;

        return $this;
    }

    /**
     * Get totalMont
     *
     * @return string
     */
    public function getTotalMont()
    {
        return $this->totalMont;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->avance = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add avance
     *
     * @param \AppBundle\Entity\Avance $avance
     *
     * @return Mont
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
}
