<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lentile
 *
 * @ORM\Table(name="lentile")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LentileRepository")
 */
class Lentile
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
     * @ORM\Column(name="lens_od_sph", type="string", length=255)
     */
    private $lensOdSph;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_od_cyl", type="string", length=255)
     */
    private $lensOdCyl;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_od_axe", type="string", length=255)
     */
    private $lensOdAxe;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_od_k1", type="string", length=255)
     */
    private $lensOdK1;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_od_k2", type="string", length=255)
     */
    private $lensOdK2;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_og_sph", type="string", length=255)
     */
    private $lensOgSph;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_og_cyl", type="string", length=255)
     */
    private $lensOgCyl;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_og_axe", type="string", length=255)
     */
    private $lensOgAxe;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_og_k1", type="string", length=255)
     */
    private $lensOgK1;

    /**
     * @var string
     *
     * @ORM\Column(name="lens_og_k2", type="string", length=255)
     */
    private $lensOgK2;

    /**
     * @var string
     *
     * @ORM\Column(name="lenref", type="string", length=255)
     */
    private $lenref;

    /**
     * @var string
     *
     * @ORM\Column(name="lenprix", type="string", length=255)
     */
    private $lenprix;

    /**
     * @var string
     *
     * @ORM\Column(name="lendate", type="string", length=255)
     */
    private $lendate;

    /**
     *  @ORM\ManyToOne(targetEntity="Clients", inversedBy="lentile")
     */
    private $client;

    /**
     *  @ORM\OneToMany(targetEntity="Avance", mappedBy="lent",cascade={"persist", "remove"})
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
     * Set lensph
     *
     * @param string $lensph
     *
     * @return Lentile
     */
    public function setLensph($lensph)
    {
        $this->lensph = $lensph;

        return $this;
    }

    /**
     * Get lensph
     *
     * @return string
     */
    public function getLensph()
    {
        return $this->lensph;
    }

    /**
     * Set lencyl
     *
     * @param string $lencyl
     *
     * @return Lentile
     */
    public function setLencyl($lencyl)
    {
        $this->lencyl = $lencyl;

        return $this;
    }

    /**
     * Get lencyl
     *
     * @return string
     */
    public function getLencyl()
    {
        return $this->lencyl;
    }

    /**
     * Set lenaxe
     *
     * @param string $lenaxe
     *
     * @return Lentile
     */
    public function setLenaxe($lenaxe)
    {
        $this->lenaxe = $lenaxe;

        return $this;
    }

    /**
     * Get lenaxe
     *
     * @return string
     */
    public function getLenaxe()
    {
        return $this->lenaxe;
    }

    /**
     * Set lenka
     *
     * @param string $lenka
     *
     * @return Lentile
     */
    public function setLenka($lenka)
    {
        $this->lenka = $lenka;

        return $this;
    }

    /**
     * Get lenka
     *
     * @return string
     */
    public function getLenka()
    {
        return $this->lenka;
    }

    /**
     * Set lenkb
     *
     * @param string $lenkb
     *
     * @return Lentile
     */
    public function setLenkb($lenkb)
    {
        $this->lenkb = $lenkb;

        return $this;
    }

    /**
     * Get lenkb
     *
     * @return string
     */
    public function getLenkb()
    {
        return $this->lenkb;
    }

    /**
     * Set lenkc
     *
     * @param string $lenkc
     *
     * @return Lentile
     */
    public function setLenkc($lenkc)
    {
        $this->lenkc = $lenkc;

        return $this;
    }

    /**
     * Get lenkc
     *
     * @return string
     */
    public function getLenkc()
    {
        return $this->lenkc;
    }

    /**
     * Set lenref
     *
     * @param string $lenref
     *
     * @return Lentile
     */
    public function setLenref($lenref)
    {
        $this->lenref = $lenref;

        return $this;
    }

    /**
     * Get lenref
     *
     * @return string
     */
    public function getLenref()
    {
        return $this->lenref;
    }

    /**
     * Set lenprix
     *
     * @param string $lenprix
     *
     * @return Lentile
     */
    public function setLenprix($lenprix)
    {
        $this->lenprix = $lenprix;

        return $this;
    }

    /**
     * Get lenprix
     *
     * @return string
     */
    public function getLenprix()
    {
        return $this->lenprix;
    }

    /**
     * Set lendate
     *
     * @param string $lendate
     *
     * @return Lentile
     */
    public function setLendate($lendate)
    {
        $this->lendate = $lendate;

        return $this;
    }

    /**
     * Get lendate
     *
     * @return string
     */
    public function getLendate()
    {
        return $this->lendate;
    }

    /**
     * Set lensOdSph
     *
     * @param string $lensOdSph
     *
     * @return Lentile
     */
    public function setLensOdSph($lensOdSph)
    {
        $this->lensOdSph = $lensOdSph;

        return $this;
    }

    /**
     * Get lensOdSph
     *
     * @return string
     */
    public function getLensOdSph()
    {
        return $this->lensOdSph;
    }

    /**
     * Set lensOdCyl
     *
     * @param string $lensOdCyl
     *
     * @return Lentile
     */
    public function setLensOdCyl($lensOdCyl)
    {
        $this->lensOdCyl = $lensOdCyl;

        return $this;
    }

    /**
     * Get lensOdCyl
     *
     * @return string
     */
    public function getLensOdCyl()
    {
        return $this->lensOdCyl;
    }

    /**
     * Set lensOdAxe
     *
     * @param string $lensOdAxe
     *
     * @return Lentile
     */
    public function setLensOdAxe($lensOdAxe)
    {
        $this->lensOdAxe = $lensOdAxe;

        return $this;
    }

    /**
     * Get lensOdAxe
     *
     * @return string
     */
    public function getLensOdAxe()
    {
        return $this->lensOdAxe;
    }

    /**
     * Set lensOdK1
     *
     * @param string $lensOdK1
     *
     * @return Lentile
     */
    public function setLensOdK1($lensOdK1)
    {
        $this->lensOdK1 = $lensOdK1;

        return $this;
    }

    /**
     * Get lensOdK1
     *
     * @return string
     */
    public function getLensOdK1()
    {
        return $this->lensOdK1;
    }

    /**
     * Set lensOdK2
     *
     * @param string $lensOdK2
     *
     * @return Lentile
     */
    public function setLensOdK2($lensOdK2)
    {
        $this->lensOdK2 = $lensOdK2;

        return $this;
    }

    /**
     * Get lensOdK2
     *
     * @return string
     */
    public function getLensOdK2()
    {
        return $this->lensOdK2;
    }

    /**
     * Set lensOgSph
     *
     * @param string $lensOgSph
     *
     * @return Lentile
     */
    public function setLensOgSph($lensOgSph)
    {
        $this->lensOgSph = $lensOgSph;

        return $this;
    }

    /**
     * Get lensOgSph
     *
     * @return string
     */
    public function getLensOgSph()
    {
        return $this->lensOgSph;
    }

    /**
     * Set lensOgCyl
     *
     * @param string $lensOgCyl
     *
     * @return Lentile
     */
    public function setLensOgCyl($lensOgCyl)
    {
        $this->lensOgCyl = $lensOgCyl;

        return $this;
    }

    /**
     * Get lensOgCyl
     *
     * @return string
     */
    public function getLensOgCyl()
    {
        return $this->lensOgCyl;
    }

    /**
     * Set lensOgAxe
     *
     * @param string $lensOgAxe
     *
     * @return Lentile
     */
    public function setLensOgAxe($lensOgAxe)
    {
        $this->lensOgAxe = $lensOgAxe;

        return $this;
    }

    /**
     * Get lensOgAxe
     *
     * @return string
     */
    public function getLensOgAxe()
    {
        return $this->lensOgAxe;
    }

    /**
     * Set lensOgK1
     *
     * @param string $lensOgK1
     *
     * @return Lentile
     */
    public function setLensOgK1($lensOgK1)
    {
        $this->lensOgK1 = $lensOgK1;

        return $this;
    }

    /**
     * Get lensOgK1
     *
     * @return string
     */
    public function getLensOgK1()
    {
        return $this->lensOgK1;
    }

    /**
     * Set lensOgK2
     *
     * @param string $lensOgK2
     *
     * @return Lentile
     */
    public function setLensOgK2($lensOgK2)
    {
        $this->lensOgK2 = $lensOgK2;

        return $this;
    }

    /**
     * Get lensOgK2
     *
     * @return string
     */
    public function getLensOgK2()
    {
        return $this->lensOgK2;
    }

    /**
     * Set client
     *
     * @param \AppBundle\Entity\Clients $client
     *
     * @return Lentile
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
     * @return Lentile
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
