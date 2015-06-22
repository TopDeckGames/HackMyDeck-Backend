<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="user_skilltree",
 * )
 */
class UserSkillTree
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="skilltrees")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SkillTree",inversedBy="users")
     */
    protected $skill;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    /**
     * @ORM\Column(type="boolean", name="on_current_research")
     */
    private $onCurrentResearch;

    /**
     * @ORM\Column(type="boolean", name="unlocked")
     */
    private $unlocked;

    /**
     * @ORM\Column(type="integer", name="effectif_allocated")
     */
    private $effectifAllocated;
    
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
     * @return UserSkillTree
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
     * @return UserSkillTree
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
     * Set onCurrentResearch
     *
     * @param boolean $onCurrentResearch
     * @return UserSkillTree
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
     * Set unlocked
     *
     * @param boolean $unlocked
     * @return UserSkillTree
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
     * Set effectifAllocated
     *
     * @param integer $effectifAllocated
     * @return UserSkillTree
     */
    public function setEffectifAllocated($effectifAllocated)
    {
        $this->effectifAllocated = $effectifAllocated;

        return $this;
    }

    /**
     * Get effectifAllocated
     *
     * @return integer
     */
    public function getEffectifAllocated()
    {
        return $this->effectifAllocated;
    }

    /**
     * Set user
     *
     * @param \App\Entity\User $user
     * @return UserSkillTree
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
     * Set skill
     *
     * @param \App\Entity\SkillTree $skill
     * @return UserSkillTree
     */
    public function setSkill(\App\Entity\SkillTree $skill = null)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return \App\Entity\SkillTree
     */
    public function getSkill()
    {
        return $this->skill;
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
