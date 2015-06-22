<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="technology")
 */
class Technology {
    /**
     * @ORM\Id 
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $id;

    /** 
     * @ORM\Column(type="integer")
     */
    protected $damage;

    /** 
     * @ORM\ManyToOne(targetEntity="Card",inversedBy="technologies")
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
     * Set damage
     *
     * @param integer $damage
     * @return Technology
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
     * Set card
     *
     * @param \App\Entity\Card $card
     * @return Technology
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
