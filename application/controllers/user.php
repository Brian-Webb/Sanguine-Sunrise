<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function index()
    {
    }

    public function login()
    {
        $this->load->model('user_model');
        
        //set email and password from post data
        $email = $this->input->post('email');
        $password = $this->input->post('password');
       
        //if both params are provided
        if($email && $password) {
            $userId = $this->user_model->validate($email,$password);                           
        } else {
            $userId = FALSE;
        }
        
        //set session data
        if($userId) {
            $this->session->set_userdata('loggedIn',$userId);
        }
        
        echo $userId;
    }
    
    public function logout() {
        $this->session->sess_destroy();
        echo TRUE;
    }
    
    public function replaceLoginForm($userId = false) {
        //ensure that the provided userId matches current session
        if($userId == $this->session->userdata('loggedIn')){
            echo '<span>Logged into userid: <strong>' . $userId . '</strong></span>';
        } else {
            $this->session->set_userdata('hackingAttempt',TRUE);
        }
    }
    
    public function unsetHackingAttempt() {
        $this->session->unset_userdata('hackingAttempt');
        $this->load->helper('url');
        redirect('/');
    }
}