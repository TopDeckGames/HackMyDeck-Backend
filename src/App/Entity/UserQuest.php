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
     * @return UserQuest
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
     * Set updated
     *
     * @param \DateTime $updated
     * @return UserQuest
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set isDone
     *
     * @param boolean $isDone
     * @return UserQuest
     */
    public function setIsDone($isDone)
    {
        $this->isDone = $isDone;

        return $this;
    }

    /**
     * Get isDone
     *
     * @return boolean
     */
    public function getIsDone()
    {
        return $this->isDone;
    }

    /**
     * Set isRejected
     *
     * @param boolean $isRejected
     * @return UserQuest
     */
    public function setIsRejected($isRejected)
    {
        $this->isRejected = $isRejected;

        return $this;
    }

    /**
     * Get isRejected
     *
     * @return boolean
     */
    public function getIsRejected()
    {
        return $this->isRejected;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User $user
     * @return UserQuest
     */
    public function setUser(\App\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \App\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set quest
     *
     * @param \App\Entity\Quest $quest
     * @return UserQuest
     */
    public function setQuest(\App\Entity\Quest $quest = null)
    {
        $this->quest = $quest;

        return $this;
    }

    /**
     * Get quest
     *
     * @return \App\Entity\Quest
     */
    public function getQuest()
    {
        return $this->quest;
    }

    /**
     * During the entity update, set the update date
     *
     * @ORM\PreUpdate()
     */
    public function onPreUpdate()
    {
        $this->setUpdated(new \DateTime("now"));
    }
}
