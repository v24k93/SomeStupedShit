<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
    
    function show_realms_status()
    {
        if ( ! $data = $this->cache->get('realms_status'))
        {
            $this->load->model('ajax_realms_model', 'ajax');
            $data['base_url'] = base_url();
            $data['realms'] = $this->ajax_realms_model->show_realms_status();
            
            $this->cache->save('realms_status', $data, 60);
        }
        
        $this->parser->parse('realms_view', $data, false, 'ajax');
    }
}

?>
