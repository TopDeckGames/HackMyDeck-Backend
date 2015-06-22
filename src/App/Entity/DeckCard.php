<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="deck_card",
 * )
 */
class DeckCard
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Deck",inversedBy="cards")
     */
    protected $deck;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Card",inversedBy="decks")
     */
    protected $card;

    /**
     * @ORM\Column(type="integer", name="quantity")
     */
    private $quantity;
    
    /**
     * Constructor
     */
    public function __construct() {

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
     * Set quantity
     *
     * @param integer $quantity
     * @return DeckCard
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set deck
     *
     * @param \App\Entity\Deck $deck
     * @return DeckCard
     */
    public function setDeck(\App\Entity\Deck $deck = null)
    {
        $this->deck = $deck;

        return $this;
    }

    /**
     * Get deck
     *
     * @return \App\Entity\Deck
     */
    public function getDeck()
    {
        return $this->deck;
    }

    /**
     * Set card
     *
     * @param \App\Entity\Card $card
     * @return DeckCard
     */
    public function setCard(\App\Entity\Card $card = null)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get card
     *
     * @return \App\Entity\Card
     */
    public function getCard()
    {
        return $this->card;
    }

}
