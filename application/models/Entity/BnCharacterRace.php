<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BnCharacterRace
 *
 * @Table(name="battlenet_Character_Races")
 * @Entity
 */
class BnCharacterRace
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
     * @var integer
     *
     * @Column(name="mask", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $mask;

    /**
     * @var string
     *
     * @Column(name="side", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $side;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;
    
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
     * Set mask
     *
     * @param integer $mask
     * @return BnCharacterRace
     */
    public function setMask($mask)
    {
        $this->mask = $mask;
    
        return $this;
    }
    
    /**
     * Get mask
     *
     * @return integer 
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * Set side
     *
     * @param string $side
     * @return BnCharacterRace
     */
    public function setSide($side)
    {
        $this->side = $side;
    
        return $this;
    }

    /**
     * Get side
     *
     * @return string 
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BnCharacterRace
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
}