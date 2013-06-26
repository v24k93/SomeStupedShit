<?php

class Profile_model extends CI_Model {
    function set_new_settings($id, $username, $location, $gender)
    {
        $this->cms = $this->load->database('cms', TRUE);  
        $this->cms->where('id', $id);
        $data = array(
            'username' =>  $username,
            'gender' => $gender,
            'location' => $location
        );
        $this->cms->update('account_addition', $data);
        
        return $this->cms->affected_rows();
    }
}
