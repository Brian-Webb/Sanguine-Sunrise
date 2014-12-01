<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BnCharacter
 *
 * @Table(name="battlenet_Character")
 * @Entity
 */
class BnCharacter
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
     * @var \Entity\BnCharacterClass
     *
     * @ManyToOne(targetEntity="Entity\BnCharacterClass")
     * @JoinColumns({
     *   @JoinColumn(name="class", referencedColumnName="id", nullable=false)
     * })
     */
    private $class;
    
    /**
     * @var \Entity\BnCharacterRace
     *
     * @ManyToOne(targetEntity="Entity\BnCharacterRace")
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
     * @return BnCharacter
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
     * @return BnCharacter
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
     * @return BnCharacter
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
     * @param \Entity\BnCharacterClass $class
     * @return BnCharacter
     */
    public function setClass(\Entity\BnCharacterClass $class = null)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return \Entity\BnCharacterClass
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set race
     *
     * @param \Entity\BnCharacterRace $race
     * @return BnCharacter
     */
    public function setRace(\Entity\BnCharacterRace $race = null)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return \Entity\BnCharacterRace
     */
    public function getRace()
    {
        return $this->race;
    }
}