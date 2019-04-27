<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * stock
 *
 * @ORM\Table(name="stock")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\stockRepository")
 */
class Stock
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
     * @ORM\Column(name="Refproduit", type="string", length=255, unique=true)
     */
    private $refproduit;

    /**
     * @var string
     *
     * @ORM\Column(name="Prixachat", type="integer")
     */
    private $prixachat;

    /**
     * @var int
     *
     * @ORM\Column(name="Prixvente", type="integer")
     */
    private $prixvente;

    /**
     * @var string
     *
     * @ORM\Column(name="Qantite", type="integer")
     */
    private $qantite;

    /**
     * @var string
     *
     * @ORM\Column(name="Category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="Fournisseur", type="string", length=255)
     */
    private $fournisseur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date", type="datetime")
     */
    private $date;


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
     * Set refproduit
     *
     * @param string $refproduit
     *
     * @return stock
     */
    public function setRefproduit($refproduit)
    {
        $this->refproduit = $refproduit;

        return $this;
    }

    /**
     * Get refproduit
     *
     * @return string
     */
    public function getRefproduit()
    {
        return $this->refproduit;
    }

    /**
     * Set prixachat
     *
     * @param string $prixachat
     *
     * @return stock
     */
    public function setPrixachat($prixachat)
    {
        $this->prixachat = $prixachat;

        return $this;
    }

    /**
     * Get prixachat
     *
     * @return string
     */
    public function getPrixachat()
    {
        return $this->prixachat;
    }

    /**
     * Set prixvente
     *
     * @param integer $prixvente
     *
     * @return stock
     */
    public function setPrixvente($prixvente)
    {
        $this->prixvente = $prixvente;

        return $this;
    }

    /**
     * Get prixvente
     *
     * @return int
     */
    public function getPrixvente()
    {
        return $this->prixvente;
    }

    /**
     * Set qantite
     *
     * @param string $qantite
     *
     * @return stock
     */
    public function setQantite($qantite)
    {
        $this->qantite = $qantite;

        return $this;
    }

    /**
     * Get qantite
     *
     * @return string
     */
    public function getQantite()
    {
        return $this->qantite;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return stock
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set fournisseur
     *
     * @param string $fournisseur
     *
     * @return stock
     */
    public function setFournisseur($fournisseur)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return string
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return stock
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
     * Generates the magic method
     * 
     */
    public function __toString(){
        return $this->refproduit;
    }
}
