<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BnGuild
 *
 * @Table(name="battlenet_Guild")
 * @Entity
 */
class BnGuild
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
     * @Column(name="name", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;
    
    /**
     * @var integer
     *
     * @Column(name="level", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $level;

    /**
     * @var integer
     *
     * @Column(name="side", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $side;

    /**
     * @var int
     *
     * @Column(name="achievementPoints", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $achievementPoints;
    
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
     * @return BnGuild
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
     * @param integer $level
     * @return BnGuild
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
     * Set side
     *
     * @param integer $side
     * @return BnGuild
     */
    public function setSide($side)
    {
        $this->side = $side;
    
        return $this;
    }
    
    /**
     * Get side
     *
     * @return integer 
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Set achievementPoints
     *
     * @param integer $achievementPoints
     * @return BnGuild
     */
    public function setAchievementPoints($achievementPoints)
    {
        $this->achievementPoints = $achievementPoints;
    
        return $this;
    }
    
    /**
     * Get achievementPoints
     *
     * @return integer 
     */
    public function getAchievementPoints()
    {
        return $this->achievementPoints;
    }
}