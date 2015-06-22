<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="quest"
 * )
 */
class Quest
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
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", name="level")
     */
    private $level;

    /**
     * @ORM\Column(type="integer", name="credit")
     */
    private $credit;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $conditions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserQuest", mappedBy="quest")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Version", inversedBy="quests")
     */
    private $version;

    /**
     * Constructor
     */
    public function __construct() {
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
     * @return Quest
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
     * Set type
     *
     * @param integer $type
     * @return Quest
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Quest
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
     * Set level
     *
     * @param integer $level
     * @return Quest
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set credit
     *
     * @param integer $credit
     * @return Quest
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return integer
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * Set conditions
     *
     * @param string $conditions
     * @return Quest
     */
    public function setConditions($conditions)
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * Get conditions
     *
     * @return string
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Add users
     *
     * @param \App\Entity\UserQuest $users
     * @return Quest
     */
    public function addUser(\App\Entity\UserQuest $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\Entity\UserQuest $users
     */
    public function removeUser(\App\Entity\UserQuest $users)
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
     * @return Quest
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
