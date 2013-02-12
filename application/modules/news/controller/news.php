<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
                $this->title = 'News';
		$this->load->model('news_model', 'news');
                $data['news'] = $this->news_model->get_news();
		return $this->parser->parse('news', $data, true, 'news');
	}
        
        function out()
        {
            $this->load->helper('cookie');
            $this->session->sess_destroy();
            delete_cookie("remember_me_token");
            redirect('');
        }
}

