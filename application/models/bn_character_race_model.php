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
use Entity\Bn_character_race;

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bn_character_race_model extends CI_Model
{
    private $_em;
    
    function __construct() 
    {
        parent::__construct();
        $this->_em = $this->doctrine->em;
    }

    /**
     * Get Races Data from database
     *
     * @access: public
     * @param:  none
     * @return: array|boolean
     */
    function get_races() 
    {
        $races = $this->_em->createQueryBuilder()
            ->select('bncr')
            ->from('Entity\Bn_character_race', 'bncr');
        
        $result = $races->getQuery()->getArrayResult();        
        return $result ? $result : FALSE;
    }
    
    /**
     * Get One Specific Race Data from database by id
     *
     * @access: public
     * @param:  int $race_id
     * @return: Bn_character_race|boolean
     */
    function get_race_by_id($race_id) 
    {
        $result = $this->_em->getRepository('Entity\Bn_character_race')
                    ->findOneById($race_id);      
        return $result ? $result : FALSE;
    }
    
    /**
     * Add Race Data to database 
     *
     * @access: public
     * @param:  int $id
     * @param:  int $mask
     * @param:  string $side
     * @param:  string $name
     * @return: int|boolean
     */
    function add_race($id, $mask, $side, $name)
    {
        // Create new race object
        $race = new Entity\Bn_character_race;

        // Set field values
        $race->setId($id);
        $race->setMask($mask);
        $race->setSide($side);
        $race->setName($name);

        // Persist new race in db
        $this->_em->persist($race);
        $this->_em->flush();
        
        return $race->getId() ? $race->getId() : FALSE;
    }
    
    /**
     * Update Race in database 
     *
     * @access: public
     * @param:  int $id
     * @param:  int $mask
     * @param:  string $side
     * @param:  string $name
     * @return: int|boolean
     */
    function update_race($id, $mask, $side, $name)
    {
        // Create new race object
        $race = $this->get_race_by_id($id);

        // Set field values
        if(! $race->getMask() === $mask)
        {
            $race->setMask($mask);            
        }
        if(! $race->getSide() === $side)
        {
            $race->setSide($side);            
        }
        if(! $race->getName() === $name)
        {
            $race->setName($name);            
        }

        // Persist new race in db
        $this->_em->persist($race);
        $this->_em->flush();
        
        return $race->getId() ? $race->getId() : FALSE;
    }
}