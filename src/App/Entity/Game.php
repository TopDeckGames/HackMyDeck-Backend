<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="game",
 * )
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="games")
     */
    protected $user;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $created;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $totalDamage;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $totalUnit;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalTechno;
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->setCreated(new \DateTime("now"));
    }
    
    /**
     * @param $user
     * @return mixed
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
    
    /**
     * @param mixed $created
     * @return mixed
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return mixed
     */
    public function getTotalDamage()
    {
        return $this->totalDamage;
    }

    /**
     * @param mixed $totalDamage
     * @return mixed
     */
    public function setTotalDamage($totalDamage)
    {
        $this->totalDamage = $totalDamage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalUnit()
    {
        return $this->totalUnit;
    }

    /**
     * @param mixed $totalUnit
     * @return mixed
     */
    public function setTotalUnit($totalUnit)
    {
        $this->totalUnit = $totalUnit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalTechno()
    {
        return $this->totalTechno;
    }

    /**
     * @param mixed $totalTechno
     * @return mixed
     */
    public function setTotalTechno($totalTechno)
    {
        $this->totalTechno = $totalTechno;
        return $this;
    }
    
}
