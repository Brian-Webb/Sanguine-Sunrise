<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Character extends CI_Controller {
	public function index()
	{
	}
	public function profile($character_name)
	{
            $character_name = urldecode($character_name);
            $data['character'] = $this->bn_character_model->get_character_by_name($character_name, TRUE);
            
            if($data['character'] === FALSE)
            {                
                $data['error_msg'] = 'Invalid character name, please try again.';
                
                $this->load->view('templates/header', $data);
                $this->load->view('error', $data);
                $this->load->view('templates/footer', $data);
            }
            else
            {                
                // Fix thumbnail if needed
                    $ch = curl_init($data['character']['thumbnail']);

                    curl_setopt($ch, CURLOPT_NOBODY, true);
                    curl_exec($ch);
                    $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    // $retcode >= 400 -> not found, $retcode = 200, found.
                    curl_close($ch);

                    if($retcode >= 404)
                    {
                        $data['character']['thumbnail'] = 'http://placehold.it/84x84';
                    }
                    
                // Fix title if needed
                    if($data['character']['title'] !== '')
                    {
                        $data['character']['display_name'] = str_replace('%s', $data['character']['name'], $data['character']['title']);
                    }
                    else
                    {
                        $data['character']['display_name'] = $data['character']['name'];
                    }
                
                $this->load->view('templates/header', $data);
                $this->load->view('character/profile', $data);
                $this->load->view('templates/footer', $data);
            }
	}
}