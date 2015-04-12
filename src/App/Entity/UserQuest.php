<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="user_quest",
 * )
 */
class UserQuest
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="quests")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Quest",inversedBy="users")
     */
    protected $quest;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\Column(type="boolean", name="is_done")
     */
    private $isDone;

    /**
     * @ORM\Column(type="boolean", name="is_rejected")
     */
    private $isRejected;
    
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
     * @param $quest
     * @return mixed
     */
    public function setQuest($quest)
    {
        $this->quest = $quest;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuest()
    {
        return $this->quest;
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
     * @param mixed $updated
     * @return mixed
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @return boolean
     */
    public function getisDone()
    {
        return $this->isDone;
    }

    /**
     * @param boolean $isDone
     * @return mixed
     */
    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;
        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsRejected()
    {
        return $this->isRejected;
    }

    /**
     * @param boolean isRejected
     * @return mixed
     */
    public function setIsRejected($isRejected)
    {
        $this->isRejected = $isRejected;
        return $this;
    }
    
}
