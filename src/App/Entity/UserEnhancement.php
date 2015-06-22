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
     * @return UserEnhancement
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
     * @return UserEnhancement
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
     * Set unlocked
     *
     * @param boolean $unlocked
     * @return UserEnhancement
     */
    public function setUnlocked($unlocked)
    {
        $this->unlocked = $unlocked;

        return $this;
    }

    /**
     * Get unlocked
     *
     * @return boolean
     */
    public function getUnlocked()
    {
        return $this->unlocked;
    }

    /**
     * Set onCurrentResearch
     *
     * @param boolean $onCurrentResearch
     * @return UserEnhancement
     */
    public function setOnCurrentResearch($onCurrentResearch)
    {
        $this->onCurrentResearch = $onCurrentResearch;

        return $this;
    }

    /**
     * Get onCurrentResearch
     *
     * @return boolean
     */
    public function getOnCurrentResearch()
    {
        return $this->onCurrentResearch;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User $user
     * @return UserEnhancement
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
     * Set enhancement
     *
     * @param \App\Entity\Enhancement $enhancement
     * @return UserEnhancement
     */
    public function setEnhancement(\App\Entity\Enhancement $enhancement = null)
    {
        $this->enhancement = $enhancement;

        return $this;
    }

    /**
     * Get enhancement
     *
     * @return \App\Entity\Enhancement
     */
    public function getEnhancement()
    {
        return $this->enhancement;
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
