<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="leader")
 */
class Leader {
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** 
     * @ORM\Column(type="string", length=64) 
     */
    protected $name;

    /** 
     * @ORM\Column(type="string", length=64) 
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=64)
     */
    protected $effect;

    /**
     * @ORM\Column(type="integer", length=64)
     */
    protected $energy;

    /**
     * @ORM\Column(type="integer", length=64)
     */
    protected $price;

    /** 
     * @ORM\ManyToMany(targetEntity="User",mappedBy="leaders")
     */
    protected $users;

    /**
     * Constructor
     */
    public function __construct(){
        $this->users = new ArrayCollection();
    }

    /**
     * Get id
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
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
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add user
     * @param User $user
     * @return Device
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;
        return $this;
    }

    /**
     * Remove user
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     * @return ArrayCollection $users
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @return String $name($constructor)
     */
    public function __toString()
    {
        return $this->name.' ('.$this->constructor.')';
    }

}
