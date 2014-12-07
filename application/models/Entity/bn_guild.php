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
 * BnGuild
 *
 * @Table(name="battlenet_Guild")
 * @Entity
 */
class Bn_guild
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
    private $achievement_points;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return BnGuild
     */
    public function set_name($name)
    {
        $this->name = $name;
    
        return $this;
    }
    
    /**
     * Get name
     *
     * @return string 
     */
    public function get_name()
    {
        return $this->name;
    }

    /**
     * Set level
     *
     * @param integer $level
     * @return BnGuild
     */
    public function set_level($level)
    {
        $this->level = $level;
    
        return $this;
    }
    
    /**
     * Get level
     *
     * @return integer 
     */
    public function get_level()
    {
        return $this->level;
    }

    /**
     * Set side
     *
     * @param integer $side
     * @return BnGuild
     */
    public function set_side($side)
    {
        $this->side = $side;
    
        return $this;
    }
    
    /**
     * Get side
     *
     * @return integer 
     */
    public function get_side()
    {
        return $this->side;
    }

    /**
     * Set achievement_points
     *
     * @param integer $achievement_points
     * @return BnGuild
     */
    public function set_achievement_points($achievement_points)
    {
        $this->achievement_points = $achievement_points;
    
        return $this;
    }
    
    /**
     * Get achievement_points
     *
     * @return integer 
     */
    public function get_achievement_points()
    {
        return $this->achievement_points;
    }
}