<?php

namespace ApiSikaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiSikaBundle\Entity\Client;
use ApiSikaBundle\Entity\User;

/**
 * Operation
 *
 * @ORM\Table(name="operation")
 * @ORM\Entity(repositoryClass="ApiSikaBundle\Repository\OperationRepository")
 */
class Operation
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_time", type="datetime", nullable=true)
     */
    private $createdTime;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="modified_time", type="datetime", nullable=true)
     */
    private $modifiedTime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="value", type="integer", nullable=true)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="operations")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */      
    private $clientId;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="etat_validation", type="boolean", nullable=true)
     */
    private $etatValidation;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_validation", type="datetime", nullable=true)
     */
    private $dateValidation;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="operations")
     * @ORM\JoinColumn(name="by_validation", referencedColumnName="id")
     */          
    private $byValidation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="from_device", type="string", length=255, nullable=true)
     */
    private $fromDevice;

    public function __construct()
    {

        $this->createdTime = new \Datetime(); 
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdTime.
     *
     * @param \DateTime|null $createdTime
     *
     * @return Operation
     */
    public function setCreatedTime($createdTime = null)
    {
        $this->createdTime = $createdTime;

        return $this;
    }

    /**
     * Get createdTime.
     *
     * @return \DateTime|null
     */
    public function getCreatedTime()
    {
        if ($this->createdTime !== null) {
            return $this->createdTime->format('d/m/Y');
        }else
            return null;         
    }

    /**
     * Set modifiedTime.
     *
     * @param \DateTime|null $modifiedTime
     *
     * @return Operation
     */
    public function setModifiedTime($modifiedTime = null)
    {
        $this->modifiedTime = $modifiedTime;

        return $this;
    }

    /**
     * Get modifiedTime.
     *
     * @return \DateTime|null
     */
    public function getModifiedTime()
    {
        if ($this->modifiedTime !== null) {
            return $this->modifiedTime->format('d/m/Y');
        }else
            return null;        
    }

    /**
     * Set value.
     *
     * @param int|null $value
     *
     * @return Operation
     */
    public function setValue($value = null)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return int|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set clientId.
     *
     * @param Client|null $clientId
     *
     * @return Operation
     */
    public function setClientId(Client $clientId = null)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return Client
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set etatValidation.
     *
     * @param bool|null $etatValidation
     *
     * @return Operation
     */
    public function setEtatValidation($etatValidation = null)
    {
        $this->etatValidation = $etatValidation;

        return $this;
    }

    /**
     * Get etatValidation.
     *
     * @return bool|null
     */
    public function getEtatValidation()
    {
        return $this->etatValidation;
    }

    /**
     * Set dateValidation.
     *
     * @param \DateTime|null $dateValidation
     *
     * @return Operation
     */
    public function setDateValidation($dateValidation = null)
    {
        $this->dateValidation = $dateValidation;

        return $this;
    }

    /**
     * Get dateValidation.
     *
     * @return \DateTime|null
     */
    public function getDateValidation()
    {
        if ($this->dateValidation !== null) {
            return $this->dateValidation->format('d/m/Y');
        }else
            return null;
    }

    /**
     * Set byValidation.
     *
     * @param User|null $byValidation
     *
     * @return Operation
     */
    public function setByValidation(User $byValidation = null)
    {
        $this->byValidation = $byValidation;

        return $this;
    }

    /**
     * Get byValidation.
     *
     * @return User|null
     */
    public function getByValidation()
    {
        return $this->byValidation;
    }

    /**
     * Set fromDevice.
     *
     * @param string|null $fromDevice
     *
     * @return Operation
     */
    public function setFromDevice($fromDevice = null)
    {
        $this->fromDevice = $fromDevice;

        return $this;
    }

    /**
     * Get fromDevice.
     *
     * @return string|null
     */
    public function getFromDevice()
    {
        return $this->fromDevice;
    }
}
