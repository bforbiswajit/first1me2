<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="userId", columns={"userId"}), @ORM\Index(name="dealId", columns={"dealId"})})
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="commentsId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentsid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="commentedOn", type="datetime", nullable=false)
     */
    private $commentedon = 'CURRENT_TIMESTAMP';

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
     * Get commentsid
     *
     * @return integer
     */
    public function getCommentsid()
    {
        return $this->commentsid;
    }

    /**
     * Set commentedon
     *
     * @param \DateTime $commentedon
     *
     * @return Comments
     */
    public function setCommentedon($commentedon)
    {
        $this->commentedon = $commentedon;
    
        return $this;
    }

    /**
     * Get commentedon
     *
     * @return \DateTime
     */
    public function getCommentedon()
    {
        return $this->commentedon;
    }

    /**
     * Set userid
     *
     * @param \Entities\User $userid
     *
     * @return Comments
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
     * @return Comments
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

