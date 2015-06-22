<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="unit")
 */
class Unit {
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** 
     * @ORM\Column(type="integer")
     */
    protected $energy;

    /**
     * @ORM\Column(type="integer")
     */
    protected $damage;

    /**
     * @ORM\Column(type="integer")
     */
    protected $nbAttack;

    /** 
     * @ORM\ManyToOne(targetEntity="Card",inversedBy="units")
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
     * Set energy
     *
     * @param integer $energy
     * @return Unit
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
     * Set damage
     *
     * @param integer $damage
     * @return Unit
     */
    public function setDamage($damage)
    {
        $this->damage = $damage;

        return $this;
    }

    /**
     * Get damage
     *
     * @return integer
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * Set nbAttack
     *
     * @param integer $nbAttack
     * @return Unit
     */
    public function setNbAttack($nbAttack)
    {
        $this->nbAttack = $nbAttack;

        return $this;
    }

    /**
     * Get nbAttack
     *
     * @return integer
     */
    public function getNbAttack()
    {
        return $this->nbAttack;
    }

    /**
     * Set card
     *
     * @param \App\Entity\Card $card
     * @return Unit
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
