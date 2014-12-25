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
class Sync_bn_characters extends CI_Controller
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
        $fullResults = $this->battlenet->guild_profile('members');

        $members = $fullResults['members'];        
        
        // Load bn_character model
        
        // For each member, check existence in DB 
        // and either update or add the character
        $this->load->model('bn_character_model');
        $this->load->model('bn_character_class_model');
        $this->load->model('bn_character_race_model');
        
        
        foreach ($members as $member)
        {
            // Set all character variables for use
                $character = $member['character'];
                $name = $character['name'];
                $level = $character['level'];
                $thumbnail = $character['thumbnail'];
                $class = $this->bn_character_class_model->get_class_by_id($character['class']);
                $race = $this->bn_character_race_model->get_race_by_id($character['race']);
                $rank = $member['rank'];
                
            // Add title
                $current_title = '';
                $titles = $this->battlenet->character($name, 'titles');
                if(isset($titles['titles']))
                {
                    foreach ($titles['titles'] as $title)
                    {
                        if(isset($title['selected'])){
                            $current_title = $title['name'];
                        }
                    }
                }
                
            // Check if character already exists, if so update vs add      
            $bn_character = $this->bn_character_model->get_character_by_name($name, TRUE);
            if(! $bn_character === FALSE)
            {
                // Get ID of matched character
                $id = $bn_character['id'];

                // Update character
                $character_id = $this->bn_character_model->update_character($id, $name, $level, $thumbnail, $class, $race, $current_title, $rank);
            }
            else
            {
                // Add character
                $character_id = $this->bn_character_model->add_bn_character($name, $level, $thumbnail, $class, $race, $current_title, $rank);
            }
        }
    }
}