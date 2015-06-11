<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Deals
 *
 * @ORM\Table(name="deals", indexes={@ORM\Index(name="categoryId", columns={"categoryId"}), @ORM\Index(name="vendorId", columns={"vendorId"})})
 * @ORM\Entity
 */
class Deals
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
     * @var \DateTime
     *
     * @ORM\Column(name="createdOn", type="datetime", nullable=false)
     */
    private $createdon = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnailImg", type="string", length=160, nullable=false)
     */
    private $thumbnailimg;

    /**
     * @var string
     *
     * @ORM\Column(name="bigImg", type="string", length=160, nullable=false)
     */
    private $bigimg;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=30, nullable=false)
     */
    private $region;

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
     * @var integer
     *
     * @ORM\Column(name="likes", type="integer", nullable=false)
     */
    private $likes;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views;

    /**
     * @var integer
     *
     * @ORM\Column(name="psudoViews", type="integer", nullable=true)
     */
    private $psudoviews;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiresOn", type="datetime", nullable=false)
     */
    private $expireson = '0000-00-00 00:00:00';

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status;

    /**
     * @var \Entities\Category
     *
     * @ORM\ManyToOne(targetEntity="Entities\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     * })
     */
    private $categoryid;

    /**
     * @var \Entities\Vendor
     *
     * @ORM\ManyToOne(targetEntity="Entities\Vendor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendorId", referencedColumnName="id")
     * })
     */
    private $vendorid;


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
     * Set createdon
     *
     * @param \DateTime $createdon
     *
     * @return Deals
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
     * Set thumbnailimg
     *
     * @param string $thumbnailimg
     *
     * @return Deals
     */
    public function setThumbnailimg($thumbnailimg)
    {
        $this->thumbnailimg = $thumbnailimg;
    
        return $this;
    }

    /**
     * Get thumbnailimg
     *
     * @return string
     */
    public function getThumbnailimg()
    {
        return $this->thumbnailimg;
    }

    /**
     * Set bigimg
     *
     * @param string $bigimg
     *
     * @return Deals
     */
    public function setBigimg($bigimg)
    {
        $this->bigimg = $bigimg;
    
        return $this;
    }

    /**
     * Get bigimg
     *
     * @return string
     */
    public function getBigimg()
    {
        return $this->bigimg;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Deals
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set shortdesc
     *
     * @param string $shortdesc
     *
     * @return Deals
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
     * @return Deals
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
     * Set likes
     *
     * @param integer $likes
     *
     * @return Deals
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    
        return $this;
    }

    /**
     * Get likes
     *
     * @return integer
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Set views
     *
     * @param integer $views
     *
     * @return Deals
     */
    public function setViews($views)
    {
        $this->views = $views;
    
        return $this;
    }

    /**
     * Get views
     *
     * @return integer
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set psudoviews
     *
     * @param integer $psudoviews
     *
     * @return Deals
     */
    public function setPsudoviews($psudoviews)
    {
        $this->psudoviews = $psudoviews;
    
        return $this;
    }

    /**
     * Get psudoviews
     *
     * @return integer
     */
    public function getPsudoviews()
    {
        return $this->psudoviews;
    }

    /**
     * Set expireson
     *
     * @param \DateTime $expireson
     *
     * @return Deals
     */
    public function setExpireson($expireson)
    {
        $this->expireson = $expireson;
    
        return $this;
    }

    /**
     * Get expireson
     *
     * @return \DateTime
     */
    public function getExpireson()
    {
        return $this->expireson;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Deals
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
     * Set categoryid
     *
     * @param \Entities\Category $categoryid
     *
     * @return Deals
     */
    public function setCategoryid(\Entities\Category $categoryid = null)
    {
        $this->categoryid = $categoryid;
    
        return $this;
    }

    /**
     * Get categoryid
     *
     * @return \Entities\Category
     */
    public function getCategoryid()
    {
        return $this->categoryid;
    }

    /**
     * Set vendorid
     *
     * @param \Entities\Vendor $vendorid
     *
     * @return Deals
     */
    public function setVendorid(\Entities\Vendor $vendorid = null)
    {
        $this->vendorid = $vendorid;
    
        return $this;
    }

    /**
     * Get vendorid
     *
     * @return \Entities\Vendor
     */
    public function getVendorid()
    {
        return $this->vendorid;
    }
}
