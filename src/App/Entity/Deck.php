<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="deck"
 * )
 */
class Deck {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game", mappedBy="firstToPlay")
     */
    protected $games;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game", mappedBy="secondToPlay")
     */
    protected $gamesSecond;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="decks")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Leader",inversedBy="decks")
     */
    protected $leader;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DeckCard", mappedBy="deck")
     */
    protected $cards;

    function __construct()
    {
        $this->games = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gamesSecond = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Deck
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
     * Set color
     *
     * @param string $color
     * @return Deck
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Add games
     *
     * @param \App\Entity\Game $games
     * @return Deck
     */
    public function addGame(\App\Entity\Game $games)
    {
        $this->games[] = $games;

        return $this;
    }

    /**
     * Remove games
     *
     * @param \App\Entity\Game $games
     */
    public function removeGame(\App\Entity\Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Add gamesSecond
     *
     * @param \App\Entity\Game $gamesSecond
     * @return Deck
     */
    public function addGamesSecond(\App\Entity\Game $gamesSecond)
    {
        $this->gamesSecond[] = $gamesSecond;

        return $this;
    }

    /**
     * Remove gamesSecond
     *
     * @param \App\Entity\Game $gamesSecond
     */
    public function removeGamesSecond(\App\Entity\Game $gamesSecond)
    {
        $this->gamesSecond->removeElement($gamesSecond);
    }

    /**
     * Get gamesSecond
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGamesSecond()
    {
        return $this->gamesSecond;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User $user
     * @return Deck
     */
    public function setUser(\App\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set leader
     *
     * @param \App\Entity\Leader $leader
     * @return Deck
     */
    public function setLeader(\App\Entity\Leader $leader = null)
    {
        $this->leader = $leader;

        return $this;
    }

    /**
     * Get leader
     *
     * @return \App\Entity\Leader
     */
    public function getLeader()
    {
        return $this->leader;
    }

    /**
     * Add cards
     *
     * @param \App\Entity\DeckCard $cards
     * @return Deck
     */
    public function addCard(\App\Entity\DeckCard $cards)
    {
        $this->cards[] = $cards;

        return $this;
    }

    /**
     * Remove cards
     *
     * @param \App\Entity\DeckCard $cards
     */
    public function removeCard(\App\Entity\DeckCard $cards)
    {
        $this->cards->removeElement($cards);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCards()
    {
        return $this->cards;
    }

}