<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="user_enhancement",
 * )
 */
class UserEnhancement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="enhancements")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enhancement",inversedBy="users")
     */
    protected $enhancement;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\Column(type="boolean", name="unlocked")
     */
    private $unlocked;

    /**
     * @ORM\Column(type="boolean", name="on_current_research")
     */
    private $onCurrentResearch;
    
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
    public function getUnlocked()
    {
        return $this->unlocked;
    }

    /**
     * @param boolean $unlocked
     * @return mixed
     */
    public function setUnlocked($unlocked)
    {
        $this->unlocked = $unlocked;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnCurrentResearch()
    {
        return $this->onCurrentResearch;
    }

    /**
     * @param mixed $onCurrentResearch
     */
    public function setOnCurrentResearch($onCurrentResearch)
    {
        $this->onCurrentResearch = $onCurrentResearch;
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
