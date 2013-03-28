<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index($id = '')
    {
        $data_user = array();
        $own = FALSE;
        
        if($this->datauser->is_logged)
        {
            $own = TRUE;
            $data_user = array($this->datauser);
        }
        elseif(is_int((int)$id) && $id > 0)
        {
            $data_user = new datauser($id);
            
            if( ! $data_user->ini)
                redirect('');
            
            if( $data_user->id == $id)
                $own = TRUE;
            
            $data_user = array($data_user);
        }
        else
            redirect('');
        
        $this->title = "Profile";
        $data['membership'] = $data_user;
        
        return $this->parser->parse('profile_view', $data, true, 'profile');
    }
}

?>
