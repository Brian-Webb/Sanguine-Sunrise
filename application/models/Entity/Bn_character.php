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
 * Bn_character
 *
 * @Table(name="battlenet_Character")
 * @Entity
 */
class Bn_character
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
     * @var \Entity\Bn_character_class
     *
     * @ManyToOne(targetEntity="Entity\Bn_character_class")
     * @JoinColumns({
     *   @JoinColumn(name="class", referencedColumnName="id", nullable=false)
     * })
     */
    private $class;
    
    /**
     * @var \Entity\Bn_character_race
     *
     * @ManyToOne(targetEntity="Entity\Bn_character_race")
     * @JoinColumns({
     *   @JoinColumn(name="race", referencedColumnName="id", nullable=false)
     * })
     */
    private $race;

    /**
     * @var string
     *
     * @Column(name="title", type="string", length=80, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

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
     * @return Bn_character
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
     * @return Bn_character
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
     * @return Bn_character
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
     * @param \Entity\Bn_character_class $class
     * @return Bn_character
     */
    public function setClass(\Entity\Bn_character_class $class = null)
    {
        $this->class = $class;
    
        return $this;
    }

    /**
     * Get class
     *
     * @return \Entity\Bn_character_class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set race
     *
     * @param \Entity\Bn_character_race $race
     * @return Bn_character
     */
    public function setRace(\Entity\Bn_character_race $race = null)
    {
        $this->race = $race;
    
        return $this;
    }

    /**
     * Get race
     *
     * @return \Entity\Bn_character_race
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Bn_character
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}