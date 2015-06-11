<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seen
 *
 * @ORM\Table(name="seen", indexes={@ORM\Index(name="userId", columns={"userId"}), @ORM\Index(name="dealId", columns={"dealId"})})
 * @ORM\Entity
 */
class Seen
{
    /**
     * @var integer
     *
     * @ORM\Column(name="relationId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $relationid;

    /**
     * @var string
     *
     * @ORM\Column(name="favourite", type="string", length=1, nullable=false)
     */
    private $favourite;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=false)
     */
    private $rating;

    /**
     * @var \Entities\User
     *
     * @ORM\ManyToOne(targetEntity="Entities\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @var \Entities\Deals
     *
     * @ORM\ManyToOne(targetEntity="Entities\Deals")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dealId", referencedColumnName="id")
     * })
     */
    private $dealid;


    /**
     * Get relationid
     *
     * @return integer
     */
    public function getRelationid()
    {
        return $this->relationid;
    }

    /**
     * Set favourite
     *
     * @param string $favourite
     *
     * @return Seen
     */
    public function setFavourite($favourite)
    {
        $this->favourite = $favourite;
    
        return $this;
    }

    /**
     * Get favourite
     *
     * @return string
     */
    public function getFavourite()
    {
        return $this->favourite;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     *
     * @return Seen
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    
        return $this;
    }

    /**
     * Get rating
     *
     * @return integer
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set userid
     *
     * @param \Entities\User $userid
     *
     * @return Seen
     */
    public function setUserid(\Entities\User $userid = null)
    {
        $this->userid = $userid;
    
        return $this;
    }

    /**
     * Get userid
     *
     * @return \Entities\User
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set dealid
     *
     * @param \Entities\Deals $dealid
     *
     * @return Seen
     */
    public function setDealid(\Entities\Deals $dealid = null)
    {
        $this->dealid = $dealid;
    
        return $this;
    }

    /**
     * Get dealid
     *
     * @return \Entities\Deals
     */
    public function getDealid()
    {
        return $this->dealid;
    }
}

