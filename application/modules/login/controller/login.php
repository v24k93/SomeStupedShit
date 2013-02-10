<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
        public function __construct() 
	{
            parent::__construct();
            if($this->datauser->is_logged)
                redirect('profile');
	}

	public function validation_login()
        {            
            $this->load->library('form_validation');
            
            $rules = $this->form_validation;
            $rules->set_rules('login_username', 'Username', 'required|alpha_numeric|trim');
            $rules->set_rules('login_password', 'Password', 'required|alpha_numeric|trim');
            $return_link = $this->input->post('return_link');

            if ( ! $rules->run())
            {
                $this->session->set_flashdata('login_status', "<div class='warning'><span class='ico_warning'>Enter username/password.</span></div>");
                redirect($return_link);
            }
            
            $this->load->model('login_model', 'login');
            $username = $this->input->post('login_username');
            $password = $this->input->post('login_password');   
            
            if( ! $data_user = $this->login_model->get_account($username, $password))
            {
                $this->session->set_flashdata('login_status', "<div class='fail'><span class='ico_cancel'>Invalid account.</span></div>");
                redirect($return_link);
            }
            
            if( ! $data_user_cms = $this->login_model->get_account_cms($data_user['id'], $data_user['username']))
            {
                $this->session->set_flashdata('login_status', "<div class='fail'><span class='ico_cancel'>Invalid account.</span></div>");
                redirect($return_link);
            }
            
            $newdata = array(
                'id'        =>  $data_user['id'],
                'username'  =>  $data_user['username'],
                'expansion' =>  $data_user['expansion'],
                'email'     =>  $data_user['email'],
                'join_date' =>  $data_user['joindate'],
                'last_ip'   =>  $data_user['last_ip'],
                'last_login'=>  $data_user['last_login'],
                'nickname'  =>  $data_user_cms['username'],
                'vp'        =>  $data_user_cms['vp'],
                'dp'        =>  $data_user_cms['dp'],
                'avatar'    =>  $data_user_cms['avatar'],
                'reputation'=>  $data_user_cms['reputation'],
                'posts'     =>  $data_user_cms['posts'],
                'gender'    =>  $data_user_cms['gender'],
                'rank'      =>  $data_user_cms['rank'],
                'gm_level'  =>  $this->login_model->get_user_gmlevel($data_user['id']),
                'is_logged' =>  TRUE
                );
            
            $this->session->set_userdata(array('data_user' => $newdata));
            
            if($this->input->post('login_remember_me') == '1')
            {
                $remember_me_token = strtoupper($username).'-'.$data_user['sha_password'];
                $cookie = array(
                    'name'   => 'remember_me_token',
                    'value'  => $remember_me_token,
                    'expire' => '31536000'
                    );
                $this->load->helper('cookie');
                $this->input->set_cookie($cookie);      
            }
            
            redirect('profile');
        }
}

