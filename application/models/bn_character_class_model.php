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
use Entity\Bn_character_class;

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bn_character_class_model extends CI_Model
{
    private $_em;
    
    function __construct() 
    {
        parent::__construct();
        $this->_em = $this->doctrine->em;
    }

    /**
     * Get Classes Data from database
     *
     * @access: public
     * @param:  none
     * @return: array|boolean
     */
    function get_classes() 
    {
        $classes = $this->_em->createQueryBuilder()
            ->select('bncc')
            ->from('Entity\Bn_character_class', 'bncc');
        
        $result = $classes->getQuery()->getArrayResult();        
        return $result ? $result : FALSE;
    }
    
    /**
     * Get One Specific Class Data from database by id
     *
     * @access: public
     * @param:  int $id
     * @return: Bn_character_class|boolean
     */
    function get_class_by_id($id) 
    {
        $result = $this->_em->getRepository('Entity\Bn_character_class')
                    ->findOneById($id);
        return $result ? $result : FALSE;
    }
    
    /**
     * Add Class Data to database 
     *
     * @access: public
     * @param:  int $id
     * @param:  int $mask
     * @param:  string $power_type
     * @param:  string $name
     * @return: int|boolean
     */
    function add_class($id, $mask, $power_type, $name)
    {
        // Create new class object
        $class = new Entity\Bn_character_class;

        // Set field values
        $class->setId($id);
        $class->setMask($mask);
        $class->setPowerType($power_type);
        $class->setName($name);

        // Persist new class in db
        $this->_em->persist($class);
        $this->_em->flush();
        
        return $class->getId() ? $class->getId() : FALSE;
    }
    
    /**
     * Update Class in database 
     *
     * @access: public
     * @param:  int $id
     * @param:  int $mask
     * @param:  string $power_type
     * @param:  string $name
     * @return: int|boolean
     */
    function update_class($id, $mask, $power_type, $name)
    {
        // Create new class object
        $class = $this->get_class_by_id($id);

        // Set field values
        if(! $class->getMask() === $mask)
        {
            $class->setMask($mask);            
        }
        if(! $class->getPowerType() === $power_type)
        {
            $class->setPowerType($power_type);            
        }
        if(! $class->getName() === $name)
        {
            $class->setName($name);            
        }

        // Persist new class in db
        $this->_em->persist($class);
        $this->_em->flush();
        
        return $class->getId() ? $class->getId() : FALSE;
    }
}