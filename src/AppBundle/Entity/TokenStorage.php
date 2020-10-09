<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

/**
 * TokenStorage
 */
class TokenStorage implements TokenStorageInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $token;


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
     * Removes a CSRF token.
     *
     * @param string $tokenId The token ID
     *
     * @return string|null Returns the removed token if one existed, NULL
     *                     otherwise
     */
    public function removeToken($tokenId)
    {
        return null;
    }

    /**
     * Checks whether a token with the given token ID exists.
     *
     * @param string $tokenId The token ID
     *
     * @return bool Whether a token exists with the given ID
     */
    public function hasToken($tokenId)
    {
        $this->token = $tokenId;
    }

    /**
     * Reads a stored CSRF token.
     *
     * @param string $tokenId The token ID
     *
     * @return string The stored token
     *
     * @throws \Symfony\Component\Security\Csrf\Exception\TokenNotFoundException If the token ID does not exist
     */
    public function getToken($tokenId)
    {
        return $this->token;
    }

    /**
     * Stores a CSRF token.
     *
     * @param string $tokenId The token ID
     * @param string $token The CSRF token
     */
    public function setToken($tokenId, $token)
    {
        $this->token = $token;
    }
}

