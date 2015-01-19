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

use Doctrine\ORM\Query\ResultSetMapping;
use Entity\Availability;

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Availability_model extends CI_Model
{
    private $_em;
    
    function __construct() 
    {
        parent::__construct();
        $this->_em = $this->doctrine->em;
    }
    
    /**
     * Adds a new availability row into the database
     * 
     * @param type $character_name
     * @param type $day
     * @param type $start_time
     * @param type $end_time
     * @return type int | boolean
     */
    function add_availability($character_name, $day, $start_time, $end_time, $comments) 
    {               
        // Create new character object
        $availability = new Entity\Availability;
        
        // Set field values
        $availability->set_character_name($character_name);
        $availability->set_day($day);
        $availability->set_start_time($start_time);
        $availability->set_end_time($end_time);
        $availability->set_comments($comments);

        // Persist new character in db
        $this->_em->persist($availability);
        $this->_em->flush();
        
        return $availability->get_id() ? $availability->get_id() : FALSE;
    }
}