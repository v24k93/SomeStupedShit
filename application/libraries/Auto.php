<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auto {
    
    public $realms_info = NULL;
    
    public function __construct() 
    {	
        $this->set_realms_info();
    }
    
    private function set_realms_info()
    {
        $CI =& get_instance();
        $CI->load->driver('cache', array('adapter' => 'file'));
        
        if ( ! $realms_info = $CI->cache->get('realms_info'))
        {
            $CI->auth = $CI->load->database('auth', TRUE);
            $query = $CI->auth->get('realmlist');
            
            $realms_info = $query->result_array();
            $CI->cache->save('realms_info', $realms_info, 31536000);
        }
        
        $this->realms_info = $realms_info;
    }
}
?>
