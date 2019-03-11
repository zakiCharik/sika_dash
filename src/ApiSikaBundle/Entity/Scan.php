<?php

namespace ApiSikaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiSikaBundle\Entity\Client;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Scan
 * @Vich\Uploadable
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
     * @ORM\Column(name="qt", type="integer", nullable=true)
     */
    private $qt;

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
     * @var \DateTime
     *
     * @ORM\Column(name="generation_time", type="datetime", nullable=true)
     */
    private $generationTime;

    /**
     * @var string
     *
     * @ORM\Column(name="qr_value", type="integer", nullable=true)
     */
    private $qrValue;


    /**
     * @var string
     *
     * @ORM\Column(name="doc", type="string", length=255, nullable=true)
     */
    private $doc;

    /**
     * @Vich\UploadableField(mapping="scans_images", fileNameProperty="doc")
     * @var File
     */
    private $docFile;

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
     * Set qt
     *
     * @param integer $qt
     *
     * @return Scan
     */
    public function setQt($qt)
    {
        $this->qt = $qt;

        return $this;
    }

    /**
     * Get qt
     *
     * @return int
     */
    public function getQt()
    {
        return $this->qt;
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
     * Set generationTime
     *
     * @param \DateTime $generationTime
     *
     * @return Scan
     */
    public function setGenerationTime($generationTime)
    {
        $this->generationTime = $generationTime;

        return $this;
    }


    /**
     * Get createdTime
     *
     * @return \DateTime
     */
    public function getGenerationTime()
    {
        return $this->generationTime;
    }


    /**
     * Set docFile
     *
     * @param File $image
     *
     * @return Scan
     */
    public function setDocFile(File $doc = null)
    {
        $this->docFile = $doc;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($doc) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->createdTime = new \DateTime('now');
        }
    }

    /**
     * Get docFile
     *
     * @return File
     */
    public function getDocFile()
    {
        return $this->docFile;
    }

    /**
     * Set doc
     *
     * @param string $doc
     *
     * @return Scan
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * Get doc
     *
     * @return string
     */
    public function getDoc()
    {
        return $this->doc;
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

