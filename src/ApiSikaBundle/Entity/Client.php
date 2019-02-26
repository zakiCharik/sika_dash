<?php

namespace ApiSikaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiSikaBundle\Entity\Scan;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="ApiSikaBundle\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

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
     * @var int
     *
     * @ORM\Column(name="current_score", type="integer", nullable=true)
     */
    private $currentScore;

    /**
     * @var string
     *
     * @ORM\Column(name="display_name", type="string", length=255, nullable=true)
     */
    private $displayName;

    /**
     * @var string
     *
     * @ORM\Column(name="contactadmin", type="string", length=255, nullable=true)
     */
    private $contactadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="compteclient", type="string", length=255, nullable=true)
     */
    private $compteclient;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_connected", type="datetime", nullable=true)
     */
    private $lastConnected;

    /**
     * @ORM\OneToMany(targetEntity="Scan", mappedBy="clientId")
     */
    private $scans;

    public function __construct()
    {
        $this->scans = new ArrayCollection();
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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Client
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Client
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
     * @return Client
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
     * Set currentScore
     *
     * @param integer $currentScore
     *
     * @return Client
     */
    public function setCurrentScore($currentScore)
    {
        $this->currentScore = $currentScore;

        return $this;
    }

    /**
     * Get currentScore
     *
     * @return int
     */
    public function getCurrentScore()
    {
        return $this->currentScore;
    }

    /**
     * Set contactadmin
     *
     * @param string $contactadmin
     *
     * @return Client
     */
    public function setContactadmin($contactadmin)
    {
        $this->contactadmin = $contactadmin;

        return $this;
    }

    /**
     * Get contactadmin
     *
     * @return string
     */
    public function getContactadmin()
    {
        return $this->contactadmin;
    }

    /**
     * Set compteclient
     *
     * @param string $compteclient
     *
     * @return Client
     */
    public function setCompteclient($compteclient)
    {
        $this->compteclient = $compteclient;

        return $this;
    }

    /**
     * Get compteclient
     *
     * @return string
     */
    public function getCompteclient()
    {
        return $this->compteclient;
    }

    /**
     * Set displayName
     *
     * @param string $displayName
     *
     * @return Client
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get displayName
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }


    // Notez le singulier, on ajoute une seule catégorie à la fois
    public function addScan(Scan $scan)
    {
        // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->scans[] = $scan;

        return $this;
    }

    public function removeCategory(Scan $scan)
    {
        // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
        $this->scans->removeElement($scan);
    }

    /**
     * Set scans
     *
     * @param ArrayCollection $scans
     *
     * @return Client
     */
    public function setScans($scans)
    {
        $this->scans = $scans;

        return $this;
    }

    /**
     * Get scans
     *
     * @return ArrayCollection
     */
    public function getScans()
    {
        return $this->scans;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Client
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set tel
     *
     * @param string $tel
     *
     * @return Client
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
     * Set email
     *
     * @param string $email
     *
     * @return Client
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set lastConnected
     *
     * @param \DateTime $lastConnected
     *
     * @return Client
     */
    public function setLastConnected($lastConnected)
    {
        $this->lastConnected = $lastConnected;

        return $this;
    }

    /**
     * Get lastConnected
     *
     * @return \DateTime
     */
    public function getLastConnected()
    {
        return $this->lastConnected;
    }
}

