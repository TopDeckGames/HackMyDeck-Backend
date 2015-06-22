<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Device
 */
class Device
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $serial;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $constructor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set serial
     *
     * @param string $serial
     * @return Device
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Device
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set constructor
     *
     * @param string $constructor
     * @return Device
     */
    public function setConstructor($constructor)
    {
        $this->constructor = $constructor;

        return $this;
    }

    /**
     * Get constructor
     *
     * @return string 
     */
    public function getConstructor()
    {
        return $this->constructor;
    }

    /**
     * Add users
     *
     * @param \App\Entity\User $users
     * @return Device
     */
    public function addUser(\App\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\Entity\User $users
     */
    public function removeUser(\App\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
