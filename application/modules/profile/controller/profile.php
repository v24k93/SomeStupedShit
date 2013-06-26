<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function index($id = '')
    {
        $data_user = array();
        $own = FALSE;
        
        if($this->datauser->is_logged)
        {
            $own = TRUE;
            $data_user = array($this->datauser);
        }
        elseif(is_int((int)$id) && $id > 0)
        {
            $data_user = new datauser($id);
            
            if( ! $data_user->ini)
                redirect('');
            
            if( $data_user->id == $id)
                $own = TRUE;
            
            $data_user = array($data_user);
        }
        else
            redirect('');
        
        $this->title = "Profile";
        $data['membership'] = $data_user;
        
        return $this->parser->parse('profile_view', $data, true, 'profile');
    }
    
    function change_settings()
    {
        if( ! $this->datauser->is_logged)
            redirect('');
        
        $this->load->helper('form');
        
        $chars = array($this->datauser->nickname => $this->datauser->nickname);
        $genders = array(0 => 'Male', 1 => 'Female');
        
        foreach($this->datauser->characters as $realm)
            foreach($realm['realm_characters'] as $character)
                $chars[$character['name']] = $character['name'];
        
        $data['flashdata'] = $this->session->flashdata('change_status');
        $data['drop_nickname'] = form_dropdown('characters', $chars, $this->datauser->nickname,'class="" style="width: 300px;"');
     	$data['drop_gender'] = form_dropdown('gender', $genders, $this->datauser->gender,'class="" style="width: 300px;"');
        $data['user_location'] = $this->datauser->location;
        
        $this->title = "Account Settings Change";
        
        return $this->parser->parse('settings_change_view', $data, true, 'profile');
    }
    
    function validate_settings()
    {
        $this->load->library('form_validation');
        $rules = $this->form_validation;
        $rules->set_rules('characters', "Character", 'required|alpha_dash|trim');
        $rules->set_rules('gender', "Gender", 'required|numeric|trim');
        $rules->set_rules('location', "Location", 'alpha_dash|trim');
        
        if ($rules->run())
        {
            $this->load->model('profile_model', 'profile');
            if($this->profile_model->set_new_settings($this->datauser->id, $this->input->post('characters'), $this->input->post('location'), $this->input->post('gender')) == 1)
            {
                $this->datauser->changeData('nickname', $this->input->post('characters'));
                $this->datauser->changeData('gender', $this->input->post('gender'));
                $this->datauser->changeData('location', $this->input->post('location'));
                $this->session->set_flashdata('change_status', "<div class='success'><span class='ico_accept'>Successfuly changed.</span></div>");
            }
        }
        else
            $this->session->set_flashdata('change_status', "<div class='warning'><span class='ico_warning'>You must fill correct every field.</span></div>");
			
        redirect(base_url().'index.php/profile/change_settings');
    }
}

?>
