<?php
namespace App\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="version"
 * )
 */
class Version
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
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deployed;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enhancement",mappedBy="version")
     */
    protected $enhancements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Quest",mappedBy="version")
     */
    protected $quests;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Structure",mappedBy="version")
     */
    protected $structures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Card",mappedBy="version")
     */
    protected $cards;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SkillTree",mappedBy="version")
     */
    protected $skillTrees;

    /**
     * Constructor
     */
    public function __construct() {
        $this->enhancements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->quests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->structures = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skillTrees = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Version
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
     * @return Version
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
     * Set created
     *
     * @param \DateTime $created
     * @return Version
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
     * Set deployed
     *
     * @param \DateTime $deployed
     * @return Version
     */
    public function setDeployed($deployed)
    {
        $this->deployed = $deployed;

        return $this;
    }

    /**
     * Get deployed
     *
     * @return \DateTime
     */
    public function getDeployed()
    {
        return $this->deployed;
    }

    /**
     * Add enhancements
     *
     * @param \App\Entity\Enhancement $enhancements
     * @return Version
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
     * Add quests
     *
     * @param \App\Entity\Quest $quests
     * @return Version
     */
    public function addQuest(\App\Entity\Quest $quests)
    {
        $this->quests[] = $quests;

        return $this;
    }

    /**
     * Remove quests
     *
     * @param \App\Entity\Quest $quests
     */
    public function removeQuest(\App\Entity\Quest $quests)
    {
        $this->quests->removeElement($quests);
    }

    /**
     * Get quests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuests()
    {
        return $this->quests;
    }

    /**
     * Add structures
     *
     * @param \App\Entity\Structure $structures
     * @return Version
     */
    public function addStructure(\App\Entity\Structure $structures)
    {
        $this->structures[] = $structures;

        return $this;
    }

    /**
     * Remove structures
     *
     * @param \App\Entity\Structure $structures
     */
    public function removeStructure(\App\Entity\Structure $structures)
    {
        $this->structures->removeElement($structures);
    }

    /**
     * Get structures
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStructures()
    {
        return $this->structures;
    }

    /**
     * Add cards
     *
     * @param \App\Entity\Card $cards
     * @return Version
     */
    public function addCard(\App\Entity\Card $cards)
    {
        $this->cards[] = $cards;

        return $this;
    }

    /**
     * Remove cards
     *
     * @param \App\Entity\Card $cards
     */
    public function removeCard(\App\Entity\Card $cards)
    {
        $this->cards->removeElement($cards);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * Add skillTrees
     *
     * @param \App\Entity\SkillTree $skillTrees
     * @return Version
     */
    public function addSkillTree(\App\Entity\SkillTree $skillTrees)
    {
        $this->skillTrees[] = $skillTrees;

        return $this;
    }

    /**
     * Remove skillTrees
     *
     * @param \App\Entity\SkillTree $skillTrees
     */
    public function removeSkillTree(\App\Entity\SkillTree $skillTrees)
    {
        $this->skillTrees->removeElement($skillTrees);
    }

    /**
     * Get skillTrees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkillTrees()
    {
        return $this->skillTrees;
    }

}
