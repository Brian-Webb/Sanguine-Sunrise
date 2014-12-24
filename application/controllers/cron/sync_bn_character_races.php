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
class Sync_bn_character_races extends CI_Controller
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
        $races = $this->battlenet->character_races();
        
        // For each class, check existence in DB 
        // and either update or add the class
        $this->load->model('bn_character_race_model');        
        
        foreach ($races['races'] as $race)
        {
            // Set all class variables for use
            $id = $race['id'];
            $mask = $race['mask'];
            $side = $race['side'];
            $name = $race['name'];
                
            // Check if character already exists, if so update vs add                
            $bn_character_race = $this->bn_character_race_model->get_race_by_id($id);
            
            if($bn_character_race)
            {
                // Update race
                $bn_character_race_id = $this->bn_character_race_model->update_race($id, $mask, $side, $name);
            }
            else
            {
                // Add class
                $bn_character_race_id = $this->bn_character_race_model->add_race($id, $mask, $side, $name);
            }
        }
    }
}