<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
                $this->title = 'News';
                if ( ! $news = $this->cache->get('news'))
                {
                    $this->load->model('news_model', 'news');
                    $news = $this->news_model->get_news();
                    $this->cache->save('news', $news, 600);
                }
		
                $cont = '';
		foreach($news as $new)
                {
                    $data['title'] = $new['news_title'];
                    $data['content'] = $new['news'];
                    $cont .= $this->parser->parse('thor/template/box', $data, true);
                }
                return $cont;
	}
        
        function out()
        {
            $this->load->helper('cookie');
            $this->session->sess_destroy();
            delete_cookie("remember_me_token");
            redirect('');
        }
}

