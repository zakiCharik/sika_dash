<?php

namespace ApiSikaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiSikaBundle\Entity\Client;

/**
 * Scan
 *
 * @ORM\Table(name="scan")
 * @ORM\Entity(repositoryClass="ApiSikaBundle\Repository\ScanRepository")
 */
class Scan
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
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    private $productId;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     */
    private $score;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_time", type="datetime", nullable=true)
     */
    private $createdTime;

    /**
     * @var string
     *
     * @ORM\Column(name="qr_value", type="string", length=255, nullable=true)
     */
    private $qrValue;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer", nullable=true)
     */

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="scans")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */    
    private $clientId;

    /**
     * @var int
     *
     * @ORM\Column(name="remaining_score", type="integer", nullable=true)
     */
    private $remainingScore;


    public function __construct()
    {
        $this->createdTime = new \Datetime(); 
    }

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
     * Set productId
     *
     * @param integer $productId
     *
     * @return Scan
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set score
     *
     * @param integer $score
     *
     * @return Scan
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Scan
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
     * Set qrValue
     *
     * @param string $qrValue
     *
     * @return Scan
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
     * Set clientId
     *
     * @param Client $clientId
     *
     * @return Scan
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return Client
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set remainingScore
     *
     * @param integer $remainingScore
     *
     * @return Scan
     */
    public function setRemainingScore($remainingScore)
    {
        $this->remainingScore = $remainingScore;

        return $this;
    }

    /**
     * Get remainingScore
     *
     * @return int
     */
    public function getRemainingScore()
    {
        return $this->remainingScore;
    }
}

