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
use Entity\Bn_character;

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Bn_character_model extends CI_Model
{
    private $_em;
    
    function __construct() 
    {
        parent::__construct();
        $this->_em = $this->doctrine->em;
    }

    /**
     * Get Characters Data from database
     *
     * @access: public
     * @param:  none
     * @return: array|boolean
     */
    function get_characters($orderBy = FALSE) 
    {
        $characters = $this->_em->createQueryBuilder()
            ->select('bnc')
            ->from('Entity\Bn_character', 'bnc');
        if($orderBy) {
            $characters->orderBy('bnc.'.$orderBy,'asc');
        }
        
        $result = $characters->getQuery()->getArrayResult();        
        return $result ? $result : FALSE;
    }
    
    /**
     * Get One Specific Character Data from database by id
     *
     * @access: public
     * @param:  int $character_id
     * @return: Bn_character|boolean
     */
    function get_character_by_id($character_id, $return_array = FALSE) 
    {  
        try 
        {
            $character = $this->_em->getRepository('Entity\Bn_character')
                            ->findOneById($character_id);
        }
        catch (Exception $e) 
        {
        }
        if(!isset($character))
        {
            return FALSE;
        }
        
        if($return_array)
        {
            $result['id']        = $character->getId();
            $result['name']      = $character->getName();
            $result['level']     = $character->getLevel();
            $result['thumbnail'] = 'http://us.battle.net/static-render/us/' . $character->getThumbnail();
            $result['class']     = $character->getClass()->getName();
            $result['race']      = $character->getRace()->getName();
            $result['title']     = $character->getTitle();  
            $result['rank']     = $character->getTitle();   
        }
        else {
            $result = $character;
        }
        
        return $result ? $result : FALSE;
    }
    /**
     * Get One Specific Character Data from database by name
     *
     * @access: public
     * @param:  int $character_name
     * @return: Bn_character|boolean
     */
    function get_character_by_name($character_name, $return_array = FALSE) 
    {        
        try 
        {
            $character = $this->_em->getRepository('Entity\Bn_character')
                            ->createQueryBuilder('bnc')
                            ->where('bnc.name = :name')
                            ->setParameter('name', $character_name)
                            ->setMaxResults(1)
                            ->getQuery()
                            ->getSingleResult();
        }
        catch (Exception $e) 
        {
        }
        if(!isset($character))
        {
            return FALSE;
        }
        if($return_array)
        {
            $result['id']        = $character->getId();
            $result['name']      = $character->getName();
            $result['level']     = $character->getLevel();
            $result['thumbnail'] = 'http://us.battle.net/static-render/us/' . $character->getThumbnail();
            $result['class']     = $character->getClass()->getName();
            $result['race']      = $character->getRace()->getName();
            $result['title']     = $character->getTitle();    
            $result['rank']     = $character->getTitle();            
        }
        else {
            return $character ? $character : FALSE;
        }
        
        return $result ? $result : FALSE;
    }
    
    /**
    * Insert Character into database
    *
    * @access: public
    * @param:  string $name
    * @param:  int $level
    * @param:  string $thumbnail
    * @param:  Bn_character_class $class
    * @param:  Bn_character_race $race
    * @param:  string $title
    * @return: int|boolean
    */
    function add_bn_character($name, $level, $thumbnail, $class, $race, $title, $rank) 
    {               
        // Create new character object
        $character = new Entity\Bn_character;
        
        // Set field values
        $character->setName($name);
        $character->setLevel($level);
        $character->setThumbnail($thumbnail);
        $character->setClass($class);
        $character->setRace($race);
        $character->setTitle($title);
        $character->setRank($rank);

        // Persist new character in db
        $this->_em->persist($character);
        $this->_em->flush();
        
        return $character->getId() ? $character->getId() : FALSE;
    }
    
    /**
    * Update Character in database
    *
    * @access: public
    * @param:  int $id
    * @param:  string $name
    * @param:  int $level 
    * @param:  string $thumbnail
    * @param:  Bn_character_class $class
    * @param:  Bn_character_race $race
    * @param:  string $title
    * @return: int|boolean
    */
    function update_character($id, $name, $level, $thumbnail, $class, $race, $title, $rank) 
    {
        // Find Character
        $character = $this->get_character_by_id($id);

        // Set field values
        $character->setName($name);
        $character->setLevel($level);
        $character->setThumbnail($thumbnail);
        $character->setClass($class);
        $character->setRace($race);
        $character->setTitle($title);
        $character->setRank($rank);

        // Persist new character in db
        $this->_em->persist($character);
        $this->_em->flush();
        
        return $character->getId() ? $character->getId() : FALSE;
    }
}