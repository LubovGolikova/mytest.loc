<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="app_users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User implements UserInterface
{
    const  ROLE_USER = 'ROLE_USER';
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=254, unique=true)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @var string
     * @ORM\Column(type="string", length=254, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=64)
     */
    private $password;

    /**
     * @var array
     * @ORM\Column(type="json_array")
     */
    private $roles = [];


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string  $email
     */
    public function setEmail($email)
    {
        $this->email = $email;

    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string  $password
     */
    public function setPassword($password)
    {
        $this->password = $password;

    }


    /**
     * @return array
     */
    public function getRoles()
    {
        $roles = $this->roles;
        if(empty($roles)) {
            $roles[] = 'ROLE_USER';
        }
        return array_unique($roles);

    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
    }

    /**
     * @return null
     */
    public function getSalt()
    {
        return null;
    }




    public function eraseCredentials()
    {

    }

}

