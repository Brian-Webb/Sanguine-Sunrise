<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Widgets extends CI_Controller {
    public function index()
    {
    }

    public function loginForm()
    {       
        widget::run('login_form');
    }

    public function roster()
    {       
        widget::run('roster');
    }

    public function profile_area()
    {       
        widget::run('profile_area');
    }
    
    public function alert_box($msg, $type = FALSE)
    {   
        $data['msg'] = urldecode($msg);
        
        //set type class
        if($type) {
            $data['type'] = $type;
        } else {
            $data['type'] = '';
        }
        widget::run('alert_box', $data);
    }
}