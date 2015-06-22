<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="trap")
 */
class Trap {
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** 
     * @ORM\Column(type="text")
     */
    protected $revealType;

    /** 
     * @ORM\ManyToOne(targetEntity="Card",inversedBy="traps")
     */
    protected $card;

    /**
     * Constructor
     */
    public function __construct(){

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
     * Set revealType
     *
     * @param string $revealType
     * @return Trap
     */
    public function setRevealType($revealType)
    {
        $this->revealType = $revealType;

        return $this;
    }

    /**
     * Get revealType
     *
     * @return string
     */
    public function getRevealType()
    {
        return $this->revealType;
    }

    /**
     * Set card
     *
     * @param \App\Entity\Card $card
     * @return Trap
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
