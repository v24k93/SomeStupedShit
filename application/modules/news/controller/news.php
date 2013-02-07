<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
		$this->load->model('news_module', 'news');
		return $this->parser->parse('news', array(), true, 'news');
	}
}

