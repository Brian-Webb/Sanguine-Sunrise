<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Availability extends CI_Controller {
        public function __construct() {
            parent::__construct();
        }
        
        /**
         * Used to display the availability form
         */
	public function index()
	{
            $data['page_title'] = "Availability";
            
            $this->load->view('availability/form', $data);
	}
        
        /**
         * Used to add a characters availability
         * - Then displays confirmation page
         */
	public function save_availability()
	{
            $day_names = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
            
            foreach ($day_names as $day_name) {
                $this->add_day_availability($day_name);
            }
            
            $data['character_name'] = $this->input->post('characterName');
                
            $this->load->view('availability/saved', $data);
	}
        
        /**
         * Used to add a day row into 
         * the availability table
         * 
         * @param type $day_name
         */
        private function add_day_availability($day_name) {
            if($this->input->post()) {
                // Load resources
                $this->load->model('availability_model', 'availability_model');

                // load posted data
                $in_character_name = $this->input->post('characterName');
                $in_start_time = $this->input->post($day_name . 'StartTime');
                $in_end_time = $this->input->post($day_name . 'EndTime');
                $in_comments = $this->input->post('comments');

                // Load day number
                $day_number = $this->day_number_from_name($day_name);

                // Add row            
                $this->availability_model->add_availability($in_character_name, $day_number, $in_start_time, $in_end_time, $in_comments);
            }
        }
        
        /**
         * Used to convert day name to number
         * 
         * @param type $day_name
         * @return int | boolean
         */
        private function day_number_from_name($day_name) 
        {
            $days = array(
                'monday' => 0,
                'tuesday' => 1,
                'wednesday' => 2,
                'thursday' => 3,
                'friday' => 4,
                'saturday' => 5,
                'sunday' => 6
            );
            
            
            if(array_key_exists($day_name, $days)) {
                $day_number = $days[$day_name];
            } else {
                $day_number = FALSE;
            }
            
            return $day_number;
        }
}