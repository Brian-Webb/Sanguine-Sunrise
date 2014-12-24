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
 * User
 *
 * @Table(name="user")
 * @Entity
 */
class User
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
     * @Column(name="email", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="password", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $password;

    /**
     * @var string
     *
     * @Column(name="firstName", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @Column(name="lastName", type="string", length=45, precision=0, scale=0, nullable=false, unique=false)
     */
    private $lastName;
    
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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function set_email($email)
    {
        $this->email = $email;
    
        return $this;
    }
    
    /**
     * Get email
     *
     * @return string 
     */
    public function get_email()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function set_password($password)
    {
        $this->password = $password;
    
        return $this;
    }
    
    /**
     * Get password
     *
     * @return string 
     */
    public function get_password()
    {
        return $this->password;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function set_firstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }
    
    /**
     * Get firstName
     *
     * @return string 
     */
    public function get_firstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function set_lastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }
    
    /**
     * Get lastName
     *
     * @return string 
     */
    public function get_lastName()
    {
        return $this->lastName;
    }
}