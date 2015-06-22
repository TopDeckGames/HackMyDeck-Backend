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

    }

}
