<?php

namespace ApiSikaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="ApiSikaBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_vente", type="string", length=255, nullable=true)
     */
    private $lieuVente;

    /**
     * @var string
     *
     * @ORM\Column(name="brand_name", type="string", length=255, nullable=true)
     */
    private $brandName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="production_date", type="datetime", nullable=true)
     */
    private $productionDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_time", type="datetime", nullable=true)
     */
    private $createdTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified_time", type="datetime", nullable=true)
     */
    private $modifiedTime;

    /**
     * @var string
     *
     * @ORM\Column(name="qr_value", type="text", nullable=true)
     */
    private $qrValue;

    /**
     * @var int
     *
     * @ORM\Column(name="qr_id", type="integer", nullable=true)
     */
    private $qrId;


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
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set lieuVente
     *
     * @param string $lieuVente
     *
     * @return Product
     */
    public function setLieuVente($lieuVente)
    {
        $this->lieuVente = $lieuVente;

        return $this;
    }

    /**
     * Get lieuVente
     *
     * @return string
     */
    public function getLieuVente()
    {
        return $this->lieuVente;
    }

    /**
     * Set brandName
     *
     * @param string $brandName
     *
     * @return Product
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * Get brandName
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Set productionDate
     *
     * @param \DateTime $productionDate
     *
     * @return Product
     */
    public function setProductionDate($productionDate)
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    /**
     * Get productionDate
     *
     * @return \DateTime
     */
    public function getProductionDate()
    {
        return $this->productionDate;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Product
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;

        return $this;
    }

    /**
     * Get createdTime
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * Set modifiedTime
     *
     * @param \DateTime $modifiedTime
     *
     * @return Product
     */
    public function setModifiedTime($modifiedTime)
    {
        $this->modifiedTime = $modifiedTime;

        return $this;
    }

    /**
     * Get modifiedTime
     *
     * @return \DateTime
     */
    public function getModifiedTime()
    {
        return $this->modifiedTime;
    }

    /**
     * Set qrValue
     *
     * @param string $qrValue
     *
     * @return Product
     */
    public function setQrValue($qrValue)
    {
        $this->qrValue = $qrValue;

        return $this;
    }

    /**
     * Get qrValue
     *
     * @return string
     */
    public function getQrValue()
    {
        return $this->qrValue;
    }

    /**
     * Set qrId
     *
     * @param integer $qrId
     *
     * @return Product
     */
    public function setQrId($qrId)
    {
        $this->qrId = $qrId;

        return $this;
    }

    /**
     * Get qrId
     *
     * @return int
     */
    public function getQrId()
    {
        return $this->qrId;
    }
}

