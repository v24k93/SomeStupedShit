<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status extends CI_Controller {

	public function index($realm='1', $page='0', $limit='50')
        {
            if( ! is_numeric($realm) || $realm <= 0 || ! is_numeric($page) || $page < 0 || ! is_numeric($limit) || $limit <= 0)
                redirect('');
            
            $realm_info = NULL;
            
            foreach($this->auto->realms_info as $item)
            {
                if($item['id'] != $realm)
                    continue;
                
                $realm_info = $item;
                break;
            }
            
            if($realm_info == NULL)
                redirect('');
            
            if ( ! $data = $this->cache->get('realms_status_'.$realm_info['id']))
            {
                $this->load->model('status_model', 'status');
                $data = $this->status_model->get_online_players($realm_info);
                $this->cache->save('realms_status_'.$realm_info['id'], $data, 60);
            }
            
            $data['characters'] = $data;
            $this->title = 'Status';
            return $this->parser->parse('status', $data, true, 'status');
	}
}

