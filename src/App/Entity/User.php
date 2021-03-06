<?php
namespace App\Entity;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Doctrine\ORM\Mapping AS ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="UserRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="user")
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $firstname;
    
    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $lastname;
    
    /**
     * @ORM\Column(type="string", length=60, unique=true, nullable=true)
     */
    private $phone;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $roles;

    /**
     * @ORM\Column(type="integer", name="experience")
     */
    private $experience;

    /**
     * @ORM\Column(type="integer", name="credit")
     */
    private $credit;

    /**
     * @ORM\Column(type="boolean", name="active")
     */
    private $active;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $token_expire;
    
    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime", name="last_login", nullable=true)
     */
    private $lastLogin;

    /**
     * @ORM\Column(type="integer", name="nb_login")
     */
    private $nbLogin = 0;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserLogin", mappedBy="user")
     * @ORM\OrderBy({"created" = "DESC"})
     */
    protected $logins;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserStructure", mappedBy="user")
     */
    protected $structures;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserQuest", mappedBy="user")
     */
    protected $quests;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserSkillTree", mappedBy="user")
     */
    protected $skilltrees;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserEnhancement", mappedBy="user")
     */
    protected $enhancements;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserCard", mappedBy="user")
     */
    protected $cards;

    /**
     * @ORM\ManyToMany(targetEntity="Device",cascade="persist",inversedBy="users")
     * @ORM\JoinTable(name="user_device")
     */
    protected $devices;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Deck", mappedBy="user")
     */
    protected $decks;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->active = true;
        $this->salt = md5(uniqid(null, true));
        $this->experience = 0;
        $this->logins = new \Doctrine\Common\Collections\ArrayCollection();
        $this->structures = new \Doctrine\Common\Collections\ArrayCollection();
        $this->quests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->skilltrees = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enhancements = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->devices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->decks = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @param $firstname
     * @return mixed
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }
    
    /**
     * @param $lastname
     * @return mixed
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }
    
    /**
     * @param $phone
     * @return mixed
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * Returns the password used to authenticate the user.
     * @return string The password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return mixed
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     * @return string The salt
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @param array $role
     * @return mixed
     */
    public function setRole($role)
    {
        $this->roles = $role;
        return $this;
    }
    
    /**
     * @param array $roles
     * @return mixed
     */
    public function setRoles($roles)
    {
        $this->roles = implode(",", $roles);
        return $this;
    }

    /**
     * Returns the roles granted to the user.
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        $roles = explode(",", $this->roles);
        array_push($roles, 'ROLE_USER');
        return array_unique(array_filter($roles));
    }

    /**
     * @param mixed $experience
     * @return mixed
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->Experience;
    }

    /**
     * @param $credit
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;
    }

    /**
     * @return mixed
     */
    public function getCredit()
    {
        return $this->credit;
    }

    /**
     * @param $active
     * @return mixed
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param $token
     * @return mixed
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
    
    /**
     * @param $token
     * @return mixed
     */
    public function setTokenExpire($tokenExpire)
    {
        $this->token_expire = $tokenExpire;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTokenExpire()
    {
        return $this->token_expire;
    }
    
    /**
     * @param $email
     * @return mixed
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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
     * @param mixed $lastLogin
     * @return mixed
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param mixed $nbLogin
     * @return mixed
     */
    public function setNbLogin($nbLogin)
    {
        $this->nbLogin = $nbLogin;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNbLogin()
    {
        return $this->nbLogin;
    }

    /**
     * @param $logins
     * @return mixed
     */
    public function setLogins($logins)
    {
        $this->logins = $logins;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogins()
    {
        return $this->logins;
    }

    /**
     * Add login
     *
     * @param $login
     */
    public function addLogin($login)
    {
        if(!$this->logins->contains($login)){
            $this->logins[]= $login;
        }
    }

    /**
     * Remove login
     *
     * @param $login
     */
    public function removeLogin($login){
        $this->logins->removeElement($login);
    }

    /**
     * Add Structure
     *
     * @param \App\Entity\Structure $structures
     * @return User
     */
    public function addStructure(\App\Entity\Structure $structures)
    {
        if(!$this->structures->contains($structures)){
            $this->structures[] = $structures;
        }

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
     * Add Quest
     *
     * @param \App\Entity\Quest $quests
     * @return User
     */
    public function addQuest(\App\Entity\Quest $quests)
    {
        if(!$this->quests->contains($quests)){
            $this->quests[] = $quests;
        }

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
     * Add Card
     *
     * @param \App\Entity\Card $card
     * @return User
     */
    public function addCard(\App\Entity\Card $card)
    {
        if(!$this->cards->contains($card)){
            $this->cards[] = $card;
        }

        return $this;
    }

    /**
     * Remove card
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
     * Add devices
     *
     * @param \App\Entity\Device $devices
     * @return User
     */
    public function addDevice(\App\Entity\Device $devices)
    {
        if(!$this->devices->contains($devices)){
            $this->devices[] = $devices;
        }

        return $this;
    }
    
    /**
     * Remove devices
     *
     * @param \App\Entity\Device $devices
     */
    public function removeDevice(\App\Entity\Device $devices)
    {
        $this->devices->removeElement($devices);
    }

    /**
     * Get devices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDevices()
    {
        return $this->devices;
    }

    /**
     * Add games
     *
     * @param \App\Entity\Game $games
     * @return User
     */
    public function addGame(\App\Entity\Game $games)
    {
        if(!$this->games->contains($games)){
            $this->games[] = $games;
        }

        return $this;
    }

    /**
     * Remove games
     *
     * @param \App\Entity\Game $games
     */
    public function removeGame(\App\Entity\Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGames()
    {
        return $this->games;
    }
    
    /**
     * During the entity creation, set the creation date
     *
     * @ORM\PrePersist()
     */
    public function onPrePersist()
    {
        $this->setCreated(new \DateTime("now"));
    }

    /**
     * Removes sensitive data from the user.
     * @return void
     */
    public function eraseCredentials()
    {

    }

    /**
     * @return bool
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isAccountNonLocked()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->active;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
          $this->id,
          ) = unserialize($serialized);
    }

    /**
     * @param ClassMetadata $metadata
     */
    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addConstraint(new UniqueEntity(array(
            'fields' => array('email'),
            'message' => "Cette adresse mail est déjà associée à un autre utilisateur."
        )));
    }
}