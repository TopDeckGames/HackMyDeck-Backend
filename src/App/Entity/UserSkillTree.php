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
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="quests")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SkillTree",inversedBy="users")
     */
    protected $skill;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enhancement",inversedBy="userSkillTree")
     */
    protected $lastEnhancement;
    
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
     * @param SkillTree $skill
     * @return mixed
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * @return mixed
     */
    public function getLastEnhancement()
    {
        return $this->lastEnhancement;
    }

    /**
     * @param mixed $lastEnhancement
     */
    public function setLastEnhancement($lastEnhancement)
    {
        $this->lastEnhancement = $lastEnhancement;
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
    public function getEffectifAllocated()
    {
        return $this->effectifAllocated;
    }

    /**
     * @param mixed $effectifAllocated
     */
    public function setEffectifAllocated($effectifAllocated)
    {
        $this->effectifAllocated = $effectifAllocated;
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
