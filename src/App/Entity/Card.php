<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="card"
 * )
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", name="cost_in_game")
     */
    private $costInGame;

    /**
     * @ORM\Column(type="integer", name="cost_in_store")
     */
    private $costInStore;

    /**
     * @ORM\Column(type="boolean", name="is_buyable")
     */
    private $isBuyable;

    /**
     * @ORM\Column(type="integer")
     */
    private $rarity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCard", mappedBy="card")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DeckCard", mappedBy="card")
     */
    private $decks;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enhancement", inversedBy="unlockCards")
     */
    protected $enhancement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Unit", mappedBy="card")
     */
    protected $units;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Technology", mappedBy="card")
     */
    protected $technologies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trap", mappedBy="card")
     */
    protected $traps;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Version", inversedBy="cards")
     */
    private $version;

    /**
     * Constructor
     */
    public function __construct() {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->decks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->units = new \Doctrine\Common\Collections\ArrayCollection();
        $this->technologies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->traps = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Card
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Card
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Card
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
     * Set costInGame
     *
     * @param integer $costInGame
     * @return Card
     */
    public function setCostInGame($costInGame)
    {
        $this->costInGame = $costInGame;

        return $this;
    }

    /**
     * Get costInGame
     *
     * @return integer
     */
    public function getCostInGame()
    {
        return $this->costInGame;
    }

    /**
     * Set costInStore
     *
     * @param integer $costInStore
     * @return Card
     */
    public function setCostInStore($costInStore)
    {
        $this->costInStore = $costInStore;

        return $this;
    }

    /**
     * Get costInStore
     *
     * @return integer
     */
    public function getCostInStore()
    {
        return $this->costInStore;
    }

    /**
     * Set isBuyable
     *
     * @param boolean $isBuyable
     * @return Card
     */
    public function setIsBuyable($isBuyable)
    {
        $this->isBuyable = $isBuyable;

        return $this;
    }

    /**
     * Get isBuyable
     *
     * @return boolean
     */
    public function getIsBuyable()
    {
        return $this->isBuyable;
    }

    /**
     * Set rarity
     *
     * @param integer $rarity
     * @return Card
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;

        return $this;
    }

    /**
     * Get rarity
     *
     * @return integer
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * Add users
     *
     * @param \App\Entity\UserCard $users
     * @return Card
     */
    public function addUser(\App\Entity\UserCard $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\Entity\UserCard $users
     */
    public function removeUser(\App\Entity\UserCard $users)
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

    /**
     * Add decks
     *
     * @param \App\Entity\DeckCard $decks
     * @return Card
     */
    public function addDeck(\App\Entity\DeckCard $decks)
    {
        $this->decks[] = $decks;

        return $this;
    }

    /**
     * Remove decks
     *
     * @param \App\Entity\DeckCard $decks
     */
    public function removeDeck(\App\Entity\DeckCard $decks)
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
     * Set enhancement
     *
     * @param \App\Entity\Enhancement $enhancement
     * @return Card
     */
    public function setEnhancement(\App\Entity\Enhancement $enhancement = null)
    {
        $this->enhancement = $enhancement;

        return $this;
    }

    /**
     * Get enhancement
     *
     * @return \App\Entity\Enhancement
     */
    public function getEnhancement()
    {
        return $this->enhancement;
    }

    /**
     * Add units
     *
     * @param \App\Entity\Unit $units
     * @return Card
     */
    public function addUnit(\App\Entity\Unit $units)
    {
        $this->units[] = $units;

        return $this;
    }

    /**
     * Remove units
     *
     * @param \App\Entity\Unit $units
     */
    public function removeUnit(\App\Entity\Unit $units)
    {
        $this->units->removeElement($units);
    }

    /**
     * Get units
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * Add technologies
     *
     * @param \App\Entity\Technology $technologies
     * @return Card
     */
    public function addTechnology(\App\Entity\Technology $technologies)
    {
        $this->technologies[] = $technologies;

        return $this;
    }

    /**
     * Remove technologies
     *
     * @param \App\Entity\Technology $technologies
     */
    public function removeTechnology(\App\Entity\Technology $technologies)
    {
        $this->technologies->removeElement($technologies);
    }

    /**
     * Get technologies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTechnologies()
    {
        return $this->technologies;
    }

    /**
     * Add traps
     *
     * @param \App\Entity\Trap $traps
     * @return Card
     */
    public function addTrap(\App\Entity\Trap $traps)
    {
        $this->traps[] = $traps;

        return $this;
    }

    /**
     * Remove traps
     *
     * @param \App\Entity\Trap $traps
     */
    public function removeTrap(\App\Entity\Trap $traps)
    {
        $this->traps->removeElement($traps);
    }

    /**
     * Get traps
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTraps()
    {
        return $this->traps;
    }

    /**
     * Set version
     *
     * @param \App\Entity\Version $version
     * @return Card
     */
    public function setVersion(\App\Entity\Version $version = null)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return \App\Entity\Version
     */
    public function getVersion()
    {
        return $this->version;
    }

}
