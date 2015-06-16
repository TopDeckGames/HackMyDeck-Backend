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

}
