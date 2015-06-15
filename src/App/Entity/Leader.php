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
     * @ORM\Column(type="string", length=50)
     */
    protected $name;

    /** 
     * @ORM\Column(type="string", length=255)
     */
    protected $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $effect;

    /**
     * @ORM\Column(type="integer")
     */
    protected $energy;

    /**
     * @ORM\Column(type="integer")
     */
    protected $price;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Deck", mappedBy="leader")
     */
    protected $decks;

    /**
     * Constructor
     */
    public function __construct(){
        $this->users = new ArrayCollection();
        $this->decks = new ArrayCollection();
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
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param mixed $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * @param mixed $energy
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;
    }

    /**
     * @return mixed
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * @param mixed $effect
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;
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
     * Add deck
     * @param Deck $deck
     * @return Leader
     */
    public function addDeck(Deck $deck)
    {
        $this->decks[] = $deck;
        return $this;
    }

    /**
     * Remove deck
     * @param Deck $deck
     */
    public function removeDeck(Deck $deck)
    {
        $this->decks->removeElement($deck);
    }

    /**
     * Get users
     * @return ArrayCollection $users
     */
    public function getDecks()
    {
        return $this->decks;
    }

    /**
     * @return String $name($constructor)
     */
    public function __toString()
    {
        return $this->name.' ('.$this->constructor.')';
    }

}
