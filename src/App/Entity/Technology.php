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

}
