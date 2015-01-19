<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
            if($this->session->userdata('hackingAttempt')) {
                exit();
            }
            $this->load->model('bn_character_model');
            $data['characters'] = $this->bn_character_model->get_characters();
                    
            $this->load->view('templates/header');
            $this->load->view('home', $data);
            $this->load->view('templates/footer');
	}
}