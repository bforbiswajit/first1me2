<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vendorinfo
 *
 * @ORM\Table(name="vendorinfo")
 * @ORM\Entity
 */
class Vendorinfo
{
    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=20, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=20, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="businessTitle", type="string", length=60, nullable=false)
     */
    private $businesstitle;

    /**
     * @var string
     *
     * @ORM\Column(name="desc", type="string", length=255, nullable=false)
     */
    private $desc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registeredOn", type="datetime", nullable=false)
     */
    private $registeredon = 'CURRENT_TIMESTAMP';

    /**
     * @var \Entities\Vendor
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Entities\Vendor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="vendorId", referencedColumnName="id")
     * })
     */
    private $vendorid;


    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Vendorinfo
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    
        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Vendorinfo
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    
        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set businesstitle
     *
     * @param string $businesstitle
     *
     * @return Vendorinfo
     */
    public function setBusinesstitle($businesstitle)
    {
        $this->businesstitle = $businesstitle;
    
        return $this;
    }

    /**
     * Get businesstitle
     *
     * @return string
     */
    public function getBusinesstitle()
    {
        return $this->businesstitle;
    }

    /**
     * Set desc
     *
     * @param string $desc
     *
     * @return Vendorinfo
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    
        return $this;
    }

    /**
     * Get desc
     *
     * @return string
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set registeredon
     *
     * @param \DateTime $registeredon
     *
     * @return Vendorinfo
     */
    public function setRegisteredon($registeredon)
    {
        $this->registeredon = $registeredon;
    
        return $this;
    }

    /**
     * Get registeredon
     *
     * @return \DateTime
     */
    public function getRegisteredon()
    {
        return $this->registeredon;
    }

    /**
     * Set vendorid
     *
     * @param \Entities\Vendor $vendorid
     *
     * @return Vendorinfo
     */
    public function setVendorid(\Entities\Vendor $vendorid)
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

