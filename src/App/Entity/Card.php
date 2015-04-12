<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="card"
 * )
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", name="cost_in_game")
     */
    private $costInGame;

    /**
     * @ORM\Column(type="integer", name="cost_in_store")
     */
    private $costInStore;

    /**
     * @ORM\Column(type="boolean", name="is_buyable")
     */
    private $isBuyable;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $rarity;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCard", mappedBy="card")
     */
    private $users;

    /**
     * Constructor
     */
    public function __construct() {

    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return mixed
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return mixed
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return mixed
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $costInGame
     * @return mixed
     */
    public function setCostInGame($costInGame)
    {
        $this->costInGame = $costInGame;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCostInGame()
    {
        return $this->costInGame;
    }

    /**
     * @param mixed $costInStore
     * @return mixed
     */
    public function setCostInStore($costInStore)
    {
        $this->costInStore = $costInStore;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCostInStore()
    {
        return $this->costInStore;
    }

    /**
     * @return mixed
     */
    public function getIsBuyable()
    {
        return $this->isBuyable;
    }

    /**
     * @param mixed $isBuyable
     * @return mixed
     */
    public function setIsBuyable($isBuyable)
    {
        $this->isBuyable = $isBuyable;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRarity()
    {
        return $this->rarity;
    }

    /**
     * @param mixed $rarity
     * @return mixed
     */
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
        return $this;
    }

    /**
     * Add user
     * @param User $user
     * @return Structure
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;
        return $this;
    }

    /**
     * Remove user
     * @param User $user
     */
    public function removeUser(User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     * @return ArrayCollection $users
     */
    public function getUsers()
    {
        return $this->users;
    }

}
