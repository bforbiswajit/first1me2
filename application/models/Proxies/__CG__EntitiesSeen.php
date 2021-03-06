<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Seen extends \Entities\Seen implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entities\\Seen' . "\0" . 'relationid', '' . "\0" . 'Entities\\Seen' . "\0" . 'favourite', '' . "\0" . 'Entities\\Seen' . "\0" . 'rating', '' . "\0" . 'Entities\\Seen' . "\0" . 'userid', '' . "\0" . 'Entities\\Seen' . "\0" . 'dealid');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\Seen' . "\0" . 'relationid', '' . "\0" . 'Entities\\Seen' . "\0" . 'favourite', '' . "\0" . 'Entities\\Seen' . "\0" . 'rating', '' . "\0" . 'Entities\\Seen' . "\0" . 'userid', '' . "\0" . 'Entities\\Seen' . "\0" . 'dealid');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Seen $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getRelationid()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getRelationid();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRelationid', array());

        return parent::getRelationid();
    }

    /**
     * {@inheritDoc}
     */
    public function setFavourite($favourite)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFavourite', array($favourite));

        return parent::setFavourite($favourite);
    }

    /**
     * {@inheritDoc}
     */
    public function getFavourite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFavourite', array());

        return parent::getFavourite();
    }

    /**
     * {@inheritDoc}
     */
    public function setRating($rating)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRating', array($rating));

        return parent::setRating($rating);
    }

    /**
     * {@inheritDoc}
     */
    public function getRating()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRating', array());

        return parent::getRating();
    }

    /**
     * {@inheritDoc}
     */
    public function setUserid(\Entities\User $userid = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUserid', array($userid));

        return parent::setUserid($userid);
    }

    /**
     * {@inheritDoc}
     */
    public function getUserid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUserid', array());

        return parent::getUserid();
    }

    /**
     * {@inheritDoc}
     */
    public function setDealid(\Entities\Deals $dealid = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDealid', array($dealid));

        return parent::setDealid($dealid);
    }

    /**
     * {@inheritDoc}
     */
    public function getDealid()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDealid', array());

        return parent::getDealid();
    }

}
