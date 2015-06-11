<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subscriptions
 *
 * @ORM\Table(name="subscriptions", indexes={@ORM\Index(name="userId", columns={"userId"}), @ORM\Index(name="categoryId", columns={"categoryId"})})
 * @ORM\Entity
 */
class Subscriptions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="subscriptionId", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $subscriptionid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="subscribedOn", type="datetime", nullable=false)
     */
    private $subscribedon = 'CURRENT_TIMESTAMP';

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
     * @var \Entities\Category
     *
     * @ORM\ManyToOne(targetEntity="Entities\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoryId", referencedColumnName="id")
     * })
     */
    private $categoryid;


    /**
     * Get subscriptionid
     *
     * @return integer
     */
    public function getSubscriptionid()
    {
        return $this->subscriptionid;
    }

    /**
     * Set subscribedon
     *
     * @param \DateTime $subscribedon
     *
     * @return Subscriptions
     */
    public function setSubscribedon($subscribedon)
    {
        $this->subscribedon = $subscribedon;
    
        return $this;
    }

    /**
     * Get subscribedon
     *
     * @return \DateTime
     */
    public function getSubscribedon()
    {
        return $this->subscribedon;
    }

    /**
     * Set userid
     *
     * @param \Entities\User $userid
     *
     * @return Subscriptions
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
     * Set categoryid
     *
     * @param \Entities\Category $categoryid
     *
     * @return Subscriptions
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
}
