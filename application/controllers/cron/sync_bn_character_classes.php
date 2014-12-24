<?php

/* 
 * The MIT License
 *
 * Copyright 2014 Brian.
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

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sync_bn_character_classes extends CI_Controller
{   
    /**
     * 
     * This controller will get all needed 'members' data from battlnet API
     * and sync the data with our local database using update/add logic
     * 
     */
    
    function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        // Gather battlnet data
        $this->load->library('Battlenet');
        $classes = $this->battlenet->character_classes();
        
        // Load bn_character model
        
        // For each class, check existence in DB 
        // and either update or add the class
        $this->load->model('bn_character_class_model');        
        
        foreach ($classes['classes'] as $class)
        {
            // Set all class variables for use
            $id = $class['id'];
            $mask = $class['mask'];
            $power_type = $class['powerType'];
            $name = $class['name'];
                
            // Check if character already exists, if so update vs add                
            $bn_character_class = $this->bn_character_class_model->get_class_by_id($id);
            
            if($bn_character_class)
            {
                // Update class
                $bn_character_class_id = $this->bn_character_class_model->update_class($id, $mask, $power_type, $name);
            }
            else
            {
                // Add class
                $bn_character_class_id = $this->bn_character_class_model->add_class($id, $mask, $power_type, $name);
            }
        }
    }
}