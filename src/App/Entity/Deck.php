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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Game",mappedBy="deck")
     */
    protected $games;

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
        $this->games = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * Add game
     * @param Game $game
     * @return Leader
     */
    public function addGame(Game $game)
    {
        $this->games[] = $game;
        return $this;
    }

    /**
     * Remove game
     * @param Game $game
     */
    public function removeGame(Game $game)
    {
        $this->games->removeElement($game);
    }

    /**
     * Get games
     * @return ArrayCollection $games
     */
    public function getGames()
    {
        return $this->games;
    }

}