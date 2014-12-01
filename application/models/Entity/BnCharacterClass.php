<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BnCharacterClass
 *
 * @Table(name="battlenet_Character_Classes")
 * @Entity
 */
class BnCharacterClass
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
     * @Column(name="powerType", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $powerType;

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
     * @param string $mask
     * @return BnCharacterClass
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
     * Set powerType
     *
     * @param string $powerType
     * @return BnCharacterClass
     */
    public function setPowerType($powerType)
    {
        $this->powerType = $powerType;
    
        return $this;
    }

    /**
     * Get powerType
     *
     * @return string 
     */
    public function getPowerType()
    {
        return $this->powerType;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BnCharacterClass
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