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
use Entity\User;

if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_Model extends CI_Model
{
    private $_em;
    
    function __construct() 
    {
        parent::__construct();
        $this->_em = $this->doctrine->em;
    }

    /**
     * Validate user login
     *
     * @access: public
     * @param:  none
     * @return: int|boolean
     */
    function validate($email, $password) 
    {
        try {
            $objUser = $this->_em->createQueryBuilder()
                ->select('u')
                ->from('Entity\User', 'u')
                ->where('u.email = :email')
                ->setParameter('email',$email)
                ->setMaxResults(1)
                ->getQuery()
                ->getSingleResult();
        } catch(\Doctrine\ORM\NoResultException $e) {
            return FALSE; 
        }
        //check if password is valid
        $isValidPassword = $this->bcrypt->check_password($password, $objUser->get_password());
        
        if($isValidPassword) {
            $result = $objUser->get_id();
        } else {
            $result = FALSE;
        }
        
        return $result;
    }
}