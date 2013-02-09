<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
                $this->title = 'Register';
                $this->load->helper('captcha');
                $data['base_url'] = base_url();
                $data['status'] = $this->session->flashdata('status');
                
                if($this->session->userdata('image'))
                {
                    if(file_exists(BASEPATH."../captcha/".$this->session->userdata['image']))
                            unlink(BASEPATH."../captcha/".$this->session->userdata['image']);
                    
                    $this->session->unset_userdata('image');
                }
                if($this->session->userdata('captcha'))
                    $this->session->unset_userdata('captcha');
                
		return $this->parser->parse('register', $data, true, 'register');
	}
        
        public function validation_register()
        {
            if( ! $captcha = (string) $this->session->userdata('captcha'))
                redirect('');
            
            $this->session->unset_userdata('captcha');
            
            $this->load->library('form_validation');
            
            $rules = $this->form_validation;
            $rules->set_rules('register_username', 'Username', 'required|min_length[3]|max_length[32]|alpha_dash|trim');
            $rules->set_rules('register_password', 'Password', 'required|min_length[6]|max_length[40]|trim');
            $rules->set_rules('register_re_password', 'Password Confirm', 'required|matches[register_password]|trim');
            $rules->set_rules('register_email', 'Email', 'required|valid_email|trim');
            $rules->set_rules('register_security_question', 'Security Question', 'required');
            $rules->set_rules('register_security_answer', 'Security Answer', 'required|alpha_dash|trim');
            $rules->set_rules('register_captcha', 'Captcha', 'required|trim');

            if ($rules->run() == TRUE)
            {
                $this->load->model('register_model', 'register');
                $username = $this->input->post('register_username');
                $password = $this->input->post('register_password');
                $email = $this->input->post('register_email');
                
                if($this->input->post('register_captcha') != $captcha)
                {
                    $this->session->set_flashdata('status', "<div class='warning'><span class='ico_warning'>Incorrect Captcha.</span></div>");
                    redirect('register');
                }
                
                if($this->register_model->check_username($username) == '1')
                {
                    $this->session->set_flashdata('status', "<div class='fail'><span class='ico_cancel'>Username exist.</span></div>");
                    redirect('register');
                }
                if($this->register_model->check_email($email) == '1')
                {
                    $this->session->set_flashdata('status', "<div class='fail'><span class='ico_cancel'>Email exist.</span></div>");
                    redirect('register');
                }
                
                if($this->register_model->register_account($username, $password, $email) == '1')
                {
                    $data_user = $this->register_model->get_session_username($username);
                    
                    $this->user->init($data_user['id']);
                    $_SESSION['user'] = $this->user;
                    
                    $this->register_model->add_addition_information($data_user['id'], $username, $this->input->post('register_security_question'), $this->input->post('register_security_answer'));
                    
                    redirect('profile');
                }
            }
            else
            {
                $this->session->set_flashdata('status', "<div class='warning'><span class='ico_warning'>You must fill correct every fields.</span></div>");
                redirect('register');
            }
        }
}

