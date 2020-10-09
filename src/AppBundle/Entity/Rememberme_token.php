<?php

namespace AppBundle\Entity;

/**
 * Rememberme_token
 */
class Rememberme_token
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $series;

    /**
     * @var string
     */
    private $value;

    /**
     * @var \DateTime
     */
    private $lastUsed;

    /**
     * @var string
     */
    private $class;

    /**
     * @var string
     */
    private $username;


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
     * Set series
     *
     * @param string $series
     *
     * @return Rememberme_token
     */
    public function setSeries($series)
    {
        $this->series = $series;

        return $this;
    }

    /**
     * Get series
     *
     * @return string
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return Rememberme_token
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set lastUsed
     *
     * @param \DateTime $lastUsed
     *
     * @return Rememberme_token
     */
    public function setLastUsed($lastUsed)
    {
        $this->lastUsed = $lastUsed;

        return $this;
    }

    /**
     * Get lastUsed
     *
     * @return \DateTime
     */
    public function getLastUsed()
    {
        return $this->lastUsed;
    }

    /**
     * Set class
     *
     * @param string $class
     *
     * @return Rememberme_token
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return Rememberme_token
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
}

