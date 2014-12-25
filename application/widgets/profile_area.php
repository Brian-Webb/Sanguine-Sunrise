<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Profile_area extends Widget
{
    function run() {
        $data['userId'] = $this->session->userdata('loggedIn');
        if($data['userId']) {
            $this->render('profile_area_logged_in', $data);
        } else {
            $this->render('profile_area_logged_out');
        }
    }
} 