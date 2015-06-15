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
     * @param $deck
     * @return mixed
     */
    public function setDeck($deck)
    {
        $this->deck = $deck;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeck()
    {
        return $this->deck;
    }

    /**
     * @param $card
     * @return mixed
     */
    public function setCard($card)
    {
        $this->card = $card;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param integer $quantity
     * @return mixed
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

}
