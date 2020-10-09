<?php

namespace AppBundle\Entity;

/**
 * TokenStorage_User
 */
class TokenStorage_User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $tokenStorageId;


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
     * @param string $userId
     *
     * @return TokenStorage_User
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set tokenStorageId
     *
     * @param string $tokenStorageId
     *
     * @return TokenStorage_User
     */
    public function setTokenStorageId($tokenStorageId)
    {
        $this->tokenStorageId = $tokenStorageId;

        return $this;
    }

    /**
     * Get tokenStorageId
     *
     * @return string
     */
    public function getTokenStorageId()
    {
        return $this->tokenStorageId;
    }
}

