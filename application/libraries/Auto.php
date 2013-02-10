<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class datauser {
    
    public  $username = NULL, 
            $id = 0, 
            $gm_level = 0, 
            $is_logged = FALSE, 
            $email = NULL, 
            $join_date = NULL,
            $last_ip = '127.0.0.1',
            $last_login = '0000-00-00 00:00:00',
            $expansion = 0,
            $nickname = NULL,
            $vp = 0,
            $dp = 0,
            $avatar = 'default-0.jpg',
            $reputation = 0,
            $posts = 0,
            $gender = 0,
            $rank = 0; 
    
    public function __construct() 
    {
        $this->init();        
    }
    
    public function init()
    {
        $CI =& get_instance();
        if( ! $data_user = $CI->session->userdata('data_user'))
            return;
        
        foreach($data_user as $key=>$val)
            $this->$key = $val;
    }
    
}

class Auto {
    
    public $realms_info = NULL;
    
    public function __construct() 
    {	
        $this->set_realms_info();
        $CI =& get_instance();
        $CI->datauser = new datauser();
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
