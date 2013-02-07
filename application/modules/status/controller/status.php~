<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{
                $this->load->library('parser');
		$this->load->model('register_module', 'register');
		return $this->parser->parse('register', array(), true, 'register');
	}
}

