<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Category extends \Entities\Category implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', '' . "\0" . 'Entities\\Category' . "\0" . 'id', '' . "\0" . 'Entities\\Category' . "\0" . 'displayname', '' . "\0" . 'Entities\\Category' . "\0" . 'shortdesc', '' . "\0" . 'Entities\\Category' . "\0" . 'longdesc', '' . "\0" . 'Entities\\Category' . "\0" . 'createdon', '' . "\0" . 'Entities\\Category' . "\0" . 'status', '' . "\0" . 'Entities\\Category' . "\0" . 'pseudosubscriptioncount');
        }

        return array('__isInitialized__', '' . "\0" . 'Entities\\Category' . "\0" . 'id', '' . "\0" . 'Entities\\Category' . "\0" . 'displayname', '' . "\0" . 'Entities\\Category' . "\0" . 'shortdesc', '' . "\0" . 'Entities\\Category' . "\0" . 'longdesc', '' . "\0" . 'Entities\\Category' . "\0" . 'createdon', '' . "\0" . 'Entities\\Category' . "\0" . 'status', '' . "\0" . 'Entities\\Category' . "\0" . 'pseudosubscriptioncount');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Category $proxy) {
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
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setDisplayname($displayname)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDisplayname', array($displayname));

        return parent::setDisplayname($displayname);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplayname()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisplayname', array());

        return parent::getDisplayname();
    }

    /**
     * {@inheritDoc}
     */
    public function setShortdesc($shortdesc)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShortdesc', array($shortdesc));

        return parent::setShortdesc($shortdesc);
    }

    /**
     * {@inheritDoc}
     */
    public function getShortdesc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShortdesc', array());

        return parent::getShortdesc();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongdesc($longdesc)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongdesc', array($longdesc));

        return parent::setLongdesc($longdesc);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongdesc()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongdesc', array());

        return parent::getLongdesc();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedon($createdon)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedon', array($createdon));

        return parent::setCreatedon($createdon);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedon()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedon', array());

        return parent::getCreatedon();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus($status)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', array($status));

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', array());

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setPseudosubscriptioncount($pseudosubscriptioncount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPseudosubscriptioncount', array($pseudosubscriptioncount));

        return parent::setPseudosubscriptioncount($pseudosubscriptioncount);
    }

    /**
     * {@inheritDoc}
     */
    public function getPseudosubscriptioncount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPseudosubscriptioncount', array());

        return parent::getPseudosubscriptioncount();
    }

}