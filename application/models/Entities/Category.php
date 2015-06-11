<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="displayName", type="string", length=30, nullable=false)
     */
    private $displayname;

    /**
     * @var string
     *
     * @ORM\Column(name="shortDesc", type="string", length=255, nullable=false)
     */
    private $shortdesc;

    /**
     * @var string
     *
     * @ORM\Column(name="longDesc", type="text", length=65535, nullable=false)
     */
    private $longdesc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=false)
     */
    private $createdon = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1, nullable=false)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="psudoSubscriptionCount", type="integer", nullable=true)
     */
    private $psudosubscriptioncount;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set displayname
     *
     * @param string $displayname
     *
     * @return Category
     */
    public function setDisplayname($displayname)
    {
        $this->displayname = $displayname;
    
        return $this;
    }

    /**
     * Get displayname
     *
     * @return string
     */
    public function getDisplayname()
    {
        return $this->displayname;
    }

    /**
     * Set shortdesc
     *
     * @param string $shortdesc
     *
     * @return Category
     */
    public function setShortdesc($shortdesc)
    {
        $this->shortdesc = $shortdesc;
    
        return $this;
    }

    /**
     * Get shortdesc
     *
     * @return string
     */
    public function getShortdesc()
    {
        return $this->shortdesc;
    }

    /**
     * Set longdesc
     *
     * @param string $longdesc
     *
     * @return Category
     */
    public function setLongdesc($longdesc)
    {
        $this->longdesc = $longdesc;
    
        return $this;
    }

    /**
     * Get longdesc
     *
     * @return string
     */
    public function getLongdesc()
    {
        return $this->longdesc;
    }

    /**
     * Set createdon
     *
     * @param \DateTime $createdon
     *
     * @return Category
     */
    public function setCreatedon($createdon)
    {
        $this->createdon = $createdon;
    
        return $this;
    }

    /**
     * Get createdon
     *
     * @return \DateTime
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Category
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set psudosubscriptioncount
     *
     * @param integer $psudosubscriptioncount
     *
     * @return Category
     */
    public function setPsudosubscriptioncount($psudosubscriptioncount)
    {
        $this->psudosubscriptioncount = $psudosubscriptioncount;
    
        return $this;
    }

    /**
     * Get psudosubscriptioncount
     *
     * @return integer
     */
    public function getPsudosubscriptioncount()
    {
        return $this->psudosubscriptioncount;
    }
}
