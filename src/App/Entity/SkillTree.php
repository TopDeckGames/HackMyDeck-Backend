<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="skilltree"
 * )
 */
class SkillTree
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
    private $label;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserSkillTree", mappedBy="skill")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enhancement", mappedBy="skillTree")
     */
    private $enhancements;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Version", inversedBy="skillTrees")
     */
    private $version;

    /**
     * Constructor
     */
    public function __construct() {
        $this->users = new ArrayCollection();
        $this->enhancements = new ArrayCollection();
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
     * Set label
     *
     * @param string $label
     * @return SkillTree
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return SkillTree
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
     * Add users
     *
     * @param \App\Entity\UserSkillTree $users
     * @return SkillTree
     */
    public function addUser(\App\Entity\UserSkillTree $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\Entity\UserSkillTree $users
     */
    public function removeUser(\App\Entity\UserSkillTree $users)
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
     * Add enhancements
     *
     * @param \App\Entity\Enhancement $enhancements
     * @return SkillTree
     */
    public function addEnhancement(\App\Entity\Enhancement $enhancements)
    {
        $this->enhancements[] = $enhancements;

        return $this;
    }

    /**
     * Remove enhancements
     *
     * @param \App\Entity\Enhancement $enhancements
     */
    public function removeEnhancement(\App\Entity\Enhancement $enhancements)
    {
        $this->enhancements->removeElement($enhancements);
    }

    /**
     * Get enhancements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEnhancements()
    {
        return $this->enhancements;
    }

    /**
     * Set version
     *
     * @param \App\Entity\Version $version
     * @return SkillTree
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
