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
     * @ORM\Column(type="integer")
     */
    private $winner;

    /**
     * @ORM\ManytoOne(targetEntity="App\Entity\Deck", inversedBy="games")
     */
    protected $firstToPlay;

    /**
     * @ORM\ManytoOne(targetEntity="App\Entity\Deck", inversedBy="gamesSecond")
     */
    protected $secondToPlay;
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->setCreated(new \DateTime("now"));
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
     * Set created
     *
     * @param \DateTime $created
     * @return Game
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set totalDamage
     *
     * @param integer $totalDamage
     * @return Game
     */
    public function setTotalDamage($totalDamage)
    {
        $this->totalDamage = $totalDamage;

        return $this;
    }

    /**
     * Get totalDamage
     *
     * @return integer
     */
    public function getTotalDamage()
    {
        return $this->totalDamage;
    }

    /**
     * Set totalUnit
     *
     * @param integer $totalUnit
     * @return Game
     */
    public function setTotalUnit($totalUnit)
    {
        $this->totalUnit = $totalUnit;

        return $this;
    }

    /**
     * Get totalUnit
     *
     * @return integer
     */
    public function getTotalUnit()
    {
        return $this->totalUnit;
    }

    /**
     * Set totalTechno
     *
     * @param integer $totalTechno
     * @return Game
     */
    public function setTotalTechno($totalTechno)
    {
        $this->totalTechno = $totalTechno;

        return $this;
    }

    /**
     * Get totalTechno
     *
     * @return integer
     */
    public function getTotalTechno()
    {
        return $this->totalTechno;
    }

    /**
     * Set winner
     *
     * @param integer $winner
     * @return Game
     */
    public function setWinner($winner)
    {
        $this->winner = $winner;

        return $this;
    }

    /**
     * Get winner
     *
     * @return integer
     */
    public function getWinner()
    {
        return $this->winner;
    }

    /**
     * Set firstToPlay
     *
     * @param \App\Entity\Deck $firstToPlay
     * @return Game
     */
    public function setFirstToPlay(\App\Entity\Deck $firstToPlay = null)
    {
        $this->firstToPlay = $firstToPlay;

        return $this;
    }

    /**
     * Get firstToPlay
     *
     * @return \App\Entity\Deck
     */
    public function getFirstToPlay()
    {
        return $this->firstToPlay;
    }

    /**
     * Set secondToPlay
     *
     * @param \App\Entity\Deck $secondToPlay
     * @return Game
     */
    public function setSecondToPlay(\App\Entity\Deck $secondToPlay = null)
    {
        $this->secondToPlay = $secondToPlay;

        return $this;
    }

    /**
     * Get secondToPlay
     *
     * @return \App\Entity\Deck
     */
    public function getSecondToPlay()
    {
        return $this->secondToPlay;
    }

}
