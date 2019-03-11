<?php

namespace ApiSikaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiSikaBundle\Entity\Scan;
use ApiSikaBundle\Entity\Operation;
use ApiSikaBundle\Entity\Gift;
use ApiSikaBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Client
 * @Vich\Uploadable
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
     * @Vich\UploadableField(mapping="clients_images", fileNameProperty="picture")
     * @var File
     */
    private $pictureFile;

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

    /**
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="clientId")
     */
    private $operations;

    /**
     * @ORM\OneToMany(targetEntity="Gift", mappedBy="clientId")
     */
    private $gifts;

    /**
    * @ORM\OneToOne(targetEntity=Client::class, cascade={"persist", "remove"})
    */
    protected $user;

    public function __construct()
    {
        $this->scans = new ArrayCollection();
        $this->gifts = new ArrayCollection();
        $this->operations = new ArrayCollection();
        $this->createdTime = new \Datetime(); 
    }
//-- Gift List

    // Notez le singulier, on ajoute une seule catégorie à la fois
    public function addGifts(Gift $gift)
    {
        // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->gifts[] = $gift;

        return $this;
    }

    public function removeGifts(Gift $gift)
    {
        // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
        $this->gifts->removeElement($gift);
    }

    /**
     * Set gifts
     *
     * @param ArrayCollection $gifts
     *
     * @return Client
     */
    public function setGifts($gifts)
    {
        $this->gifts = $gifts;

        return $this;
    }

    /**
     * Get gifts
     *
     * @return ArrayCollection
     */
    public function getGifts()
    {
        return $this->gifts;
    }
//-- Gift List
//-- Operation List

    // Notez le singulier, on ajoute une seule catégorie à la fois
    public function addOperation(Operation $operation)
    {
        // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->operations[] = $operation;

        return $this;
    }

    public function removeOperations(Operation $operation)
    {
        // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
        $this->operations->removeElement($operation);
    }

    /**
     * Set operations
     *
     * @param ArrayCollection $operations
     *
     * @return Client
     */
    public function setOperations($operations)
    {
        $this->operations = $operations;

        return $this;
    }

    /**
     * Get operations
     *
     * @return ArrayCollection
     */
    public function getOperations()
    {
        return $this->operations;
    }
//-- operations List

//--- Scan List



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
//--- Scan List

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
     * @param User $userId
     *
     * @return Client
     */
    public function setUser(User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return User
     */
    public function getUser()
    {
        return $this->userId;
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


    /**
     * Set pictureFile
     *
     * @param File $image
     *
     * @return Client
     */
    public function setPictureFile(File $image = null)
    {
        $this->pictureFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->modifiedTime = new \DateTime('now');
        }
    }

    /**
     * Get pictureFile
     *
     * @return File
     */
    public function getPictureFile()
    {
        return $this->pictureFile;
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

