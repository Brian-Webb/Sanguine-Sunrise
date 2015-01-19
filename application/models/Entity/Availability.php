<?php

/* 
 * The MIT License
 *
 * Copyright 2015 Brian Webb (webbsdomain@gmail.com).
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
 * Availability
 *
 * @Table(name="availability")
 * @Entity
 */
class Availability
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
     * @var day
     *
     * @Column(name="day", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $day;

    /**
     * @var string
     *
     * @Column(name="characterName", type="string", length=80, precision=0, scale=0, nullable=false, unique=false)
     */
    private $characterName;
    
    /**
     * @var integer
     *
     * @Column(name="startTime", type="string", length=10, precision=0, scale=0, nullable=false, unique=false)
     */
    private $startTime;
    
    /**
     * @var integer
     *
     * @Column(name="endTime", type="string", length=10, precision=0, scale=0, nullable=false, unique=false)
     */
    private $endTime;
    
    /**
     * @var string
     *
     * @Column(name="comments", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $comments;
    
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
     * Set day
     *
     * @param int $day
     * @return Availability
     */
    public function set_day($day)
    {
        $this->day = $day;
    
        return $this;
    }
    
    /**
     * Get day
     *
     * @return int 
     */
    public function get_day()
    {
        return $this->day;
    }

    /**
     * Set characterName
     *
     * @param string $characterName
     * @return Availability
     */
    public function set_character_name($characterName)
    {
        $this->characterName = $characterName;
    
        return $this;
    }
    
    /**
     * Get characterName
     *
     * @return string 
     */
    public function get_character_name()
    {
        return $this->characterName;
    }

    /**
     * Set startTime
     *
     * @param time $startTime
     * @return Availability
     */
    public function set_start_time($startTime)
    {
        $this->startTime = $startTime;
    
        return $this;
    }
    
    /**
     * Get startTime
     *
     * @return string 
     */
    public function get_start_time()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param string $endTime
     * @return Availability
     */
    public function set_end_time($endTime)
    {
        $this->endTime = $endTime;
    
        return $this;
    }
    
    /**
     * Get endTime
     *
     * @return string 
     */
    public function get_end_time()
    {
        return $this->endTime;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Availability
     */
    public function set_comments($comments)
    {
        $this->comments = $comments;
    
        return $this;
    }
    
    /**
     * Get comments
     *
     * @return string 
     */
    public function get_comments()
    {
        return $this->endTime;
    }
}