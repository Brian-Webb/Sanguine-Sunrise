<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Character
 *
 * @Table(name="battlenet_Character")
 * @Entity
 */
class Character
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;
    
    /**
     * @var integer
     *
     * @Column(name="level", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $level;

    /**
     * @var string
     *
     * @Column(name="thumbnail", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $thumbnail;
    
    /**
     * @var \Entity\CharacterClass
     *
     * @ManyToOne(targetEntity="Entity\CharacterClass")
     * @JoinColumns({
     *   @JoinColumn(name="class", referencedColumnName="id", nullable=false)
     * })
     */
    private $class;
    
    /**
     * @var \Entity\CharacterRace
     *
     * @ManyToOne(targetEntity="Entity\CharacterRace")
     * @JoinColumns({
     *   @JoinColumn(name="race", referencedColumnName="id", nullable=false)
     * })
     */
    private $race;

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
     * @return Character
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
     * Set level
     *
     * @param int $level
     * @return Character
     */
    public function setLevel($level)
    {
        $this->level = $level;
    
        return $this;
    }

    /**
     * Get level
     *
     * @return int 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     * @return Character
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;
    
        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string 
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Set class
     *
     * @param \Entity\CharacterClass $class
     * @return Character
     */
    public function setClass(\Entity\CharacterClass $class = null)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return \Entity\CharacterClass
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set race
     *
     * @param \Entity\CharacterRace $race
     * @return Character
     */
    public function setRace(\Entity\CharacterRace $race = null)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return \Entity\CharacterRace
     */
    public function getRace()
    {
        return $this->race;
    }
}