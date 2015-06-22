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
    public function __construct() {

    }

}
