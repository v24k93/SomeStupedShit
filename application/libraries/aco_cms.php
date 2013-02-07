<?php

class AcoCMS {
    public $is_logged = false, $is_admin = false, $id = '', $username = '';
    
    public function check_number($str)
    {
	return (bool) preg_match('/^[\-+]?[0-9]+$/', $str);
    }
    
    public function init($id = '')
    {
        if($id == '')
            return;
        if( ! $this->check_number($id))
            return;
        
        $this->id = $id;
        $this->is_admin = true;
        $this->is_logged = true;
        $this->username = 'Test';
        
        return true;
    }
}

?>
