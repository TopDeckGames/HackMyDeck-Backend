<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="structure"
 * )
 */
class Structure
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
     * @ORM\Column(type="float")
     */
    private $posX;
    /**
     * @ORM\Column(type="float")
     */
    private $posY;
    /**
     * @ORM\Column(type="float")
     */
    private $width;
    /**
     * @ORM\Column(type="float")
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserStructure", mappedBy="structure")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Version", inversedBy="structures")
     */
    private $version;

    /**
     * Constructor
     */
    public function __construct() {
        $this->users = new ArrayCollection();
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
     * @return Structure
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
     * @return Structure
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
     * Set posX
     *
     * @param float $posX
     * @return Structure
     */
    public function setPosX($posX)
    {
        $this->posX = $posX;

        return $this;
    }

    /**
     * Get posX
     *
     * @return float
     */
    public function getPosX()
    {
        return $this->posX;
    }

    /**
     * Set posY
     *
     * @param float $posY
     * @return Structure
     */
    public function setPosY($posY)
    {
        $this->posY = $posY;

        return $this;
    }

    /**
     * Get posY
     *
     * @return float
     */
    public function getPosY()
    {
        return $this->posY;
    }

    /**
     * Set width
     *
     * @param float $width
     * @return Structure
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param float $height
     * @return Structure
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Structure
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
     * Add users
     *
     * @param \App\Entity\UserStructure $users
     * @return Structure
     */
    public function addUser(\App\Entity\UserStructure $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \App\Entity\UserStructure $users
     */
    public function removeUser(\App\Entity\UserStructure $users)
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
     * @return Structure
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
