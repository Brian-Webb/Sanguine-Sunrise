<?php

/* 
 * The MIT License
 *
 * Copyright 2014 Brian Webb (webbsdomain@gmail.com).
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bn_character_class
 *
 * @Table(name="battlenet_Character_Classes")
 * @Entity
 */
class Bn_character_class
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @Id
     * @GeneratedValue(strategy="NONE")
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
    private $power_type;

    /**
     * @var string
     *
     * @Column(name="name", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * Set id
     *
     * @param int $id
     * @return Bn_character_class
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
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
     * Set mask
     *
     * @param string $mask
     * @return Bn_character_class
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
     * Set power_type
     *
     * @param string $power_type
     * @return Bn_character_class
     */
    public function setPowerType($power_type)
    {
        $this->power_type = $power_type;
    
        return $this;
    }

    /**
     * Get power_type
     *
     * @return string 
     */
    public function getPowerType()
    {
        return $this->power_type;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Bn_character_class
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