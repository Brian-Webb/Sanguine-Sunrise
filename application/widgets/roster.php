<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Roster extends Widget
{
    function run() {
        $data['characters'] = $this->bn_character_model->get_characters('rank');
        
        $this->render('roster', $data);
    }
} 