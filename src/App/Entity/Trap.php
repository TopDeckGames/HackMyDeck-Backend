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

}
