<?php

class Welcome_model extends CI_Model
{
	public function __construct() 
        {
            parent::__construct();
            $this->cms = $this->load->database('cms', TRUE);  
        }

	
}
