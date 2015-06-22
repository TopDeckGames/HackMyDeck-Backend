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
        $this->decks = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Leader
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
     * Set description
     *
     * @param string $description
     * @return Leader
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set effect
     *
     * @param string $effect
     * @return Leader
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * Get effect
     *
     * @return string
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Set energy
     *
     * @param integer $energy
     * @return Leader
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return integer
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Leader
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add decks
     *
     * @param \App\Entity\Deck $decks
     * @return Leader
     */
    public function addDeck(\App\Entity\Deck $decks)
    {
        $this->decks[] = $decks;

        return $this;
    }

    /**
     * Remove decks
     *
     * @param \App\Entity\Deck $decks
     */
    public function removeDeck(\App\Entity\Deck $decks)
    {
        $this->decks->removeElement($decks);
    }

    /**
     * Get decks
     *
     * @return \Doctrine\Common\Collections\Collection
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
