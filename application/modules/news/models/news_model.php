<?php

class News_model extends CI_Model {
    
    public function get_news()
    {
        $this->cms = $this->load->database('cms', TRUE); 
        $query = $this->cms->get('news');
        
        return $query->result_array();
    }

	
}
