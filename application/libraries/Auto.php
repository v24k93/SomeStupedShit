<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class datauser {
    
    public  $username = NULL, 
            $id = 0, 
            $gm_level = 0, 
            $is_logged = FALSE, 
            $email = NULL, 
            $joindate = NULL,
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
            $rank = 0,
            $characters = array(),
            $ini = FALSE; 
    
    public function __construct($id = '') 
    {
        if( ! $this->init($id))
            return FALSE;
    }
    
    public function init($id)
    {
        $CI =& get_instance();
        
        if(is_int((int)$id) && $id > 0)
        {
            $CI->load->model('login_model', 'login');
            if( ! $data_user = $CI->login_model->get_account_by_id($id))
                    return FALSE;
            if( ! $data_user_cms = $CI->login_model->get_account_cms_by_id($id))
                    return FALSE;
            
            $data_user = array( 
                'id'        =>  $data_user['id'],
                'username'  =>  $data_user['username'],
                'expansion' =>  $data_user['expansion'],
                'email'     =>  $data_user['email'],
                'joindate'  =>  $data_user['joindate'],
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
                'characters'=>  $CI->login_model->get_characters($id),
                'gm_level'  =>  $CI->login_model->get_user_gmlevel($id),
                'ini'       =>  TRUE
            );
            
        }
        elseif($CI->session->userdata('data_user'))
        {
            $data_user = $CI->session->userdata('data_user');
        }
        else
            return FALSE;
        
        foreach($data_user as $key=>$val)
            $this->$key = $val;
        
        return TRUE;
    }
    
}

class Auto {
    
    public $realms_info = NULL, $total_accounts = 0;
    
    public function __construct() 
    {	
        $this->set_realms_info();
        $this->set_total_accounts();
        $CI =& get_instance();
        $CI->datauser = new datauser();
    }
    
    private function set_total_accounts()
    {
        $CI =& get_instance();
        
        if ( ! $total_accounts = $CI->cache->get('total_accounts'))
        {
            $CI->auth = $CI->load->database('auth', TRUE);
            $total_accounts = $CI->auth->count_all('account');
            
            $CI->cache->save('total_accounts', $total_accounts, 31536000);
        }
        
        $this->total_accounts = $total_accounts;
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
