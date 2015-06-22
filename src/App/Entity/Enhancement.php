<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="enhancement"
 * )
 */
class Enhancement
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $effect;

    /**
     * @ORM\Column(type="integer")
     */
    private $cost;

    /**
     * @ORM\Column(type="integer")
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SkillTree", inversedBy="enhancement")
     */
    protected $skillTree;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Enhancement")
     */
    protected $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Card", mappedBy="enhancement")
     */
    protected $unlockCards;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserEnhancement", mappedBy="enhancement")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Version", inversedBy="enhancements")
     */
    private $version;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->unlockCards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Enhancement
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Enhancement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set effect
     *
     * @param string $effect
     * @return Enhancement
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * Get effect
     *
     * @return string
     */
    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * Set cost
     *
     * @param integer $cost
     * @return Enhancement
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return integer
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set time
     *
     * @param integer $time
     * @return Enhancement
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set skillTree
     *
     * @param \App\Entity\SkillTree $skillTree
     * @return Enhancement
     */
    public function setSkillTree(\App\Entity\SkillTree $skillTree = null)
    {
        $this->skillTree = $skillTree;

        return $this;
    }

    /**
     * Get skillTree
     *
     * @return \App\Entity\SkillTree
     */
    public function getSkillTree()
    {
        return $this->skillTree;
    }

    /**
     * Set parent
     *
     * @param \App\Entity\Enhancement $parent
     * @return Enhancement
     */
    public function setParent(\App\Entity\Enhancement $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \App\Entity\Enhancement
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add unlockCards
     *
     * @param \App\Entity\Card $unlockCards
     * @return Enhancement
     */
    public function addUnlockCard(\App\Entity\Card $unlockCards)
    {
        $this->unlockCards[] = $unlockCards;

        return $this;
    }

    /**
     * Remove unlockCards
     *
     * @param \App\Entity\Card $unlockCards
     */
    public function removeUnlockCard(\App\Entity\Card $unlockCards)
    {
        $this->unlockCards->removeElement($unlockCards);
    }

    /**
     * Get unlockCards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnlockCards()
    {
        return $this->unlockCards;
    }

    /**
     * Add users
     *
     * @param \App\Entity\UserEnhancement $users
     * @return Enhancement
     */
    public function addUser(\App\Entity\UserEnhancement $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\Entity\UserEnhancement $users
     */
    public function removeUser(\App\Entity\UserEnhancement $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set version
     *
     * @param \App\Entity\Version $version
     * @return Enhancement
     */
    public function setVersion(\App\Entity\Version $version = null)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return \App\Entity\Version
     */
    public function getVersion()
    {
        return $this->version;
    }

}
