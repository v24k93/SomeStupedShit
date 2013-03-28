<?php

class Profile_model extends CI_Model {
    public function __construct() 
    {
        parent::__construct();
    }
    
    function limit_string($string, $charlimit)
    {
        if(strlen($string)>$charlimit)
        {
            if(substr($string,$charlimit-1,1) != ' ')
            {
                $string = substr($string,'0',$charlimit);
                $array = explode(' ',$string);
                array_pop($array);
                $new_string = implode(' ',$array);
                
                return $new_string.' ...';
            }
            else
            {   
                return substr($string,'0',$charlimit-1).' ...';
            }
        }
        else
            return $string;
    } 
    function test_serv($ip, $port)
    {
        $socket = @fsockopen($ip, $port, $ERROR_NO, $ERROR_STR,(float)0.5);
        if($socket)
        {
            @fclose($socket);
            
            return true;
        } 
        else 
            return false;
    }
    
    function select_online_characters($characters_db)
    {
        $this->load->database();
        $config['hostname'] = $this->db->hostname;
        $config['username'] = $this->db->username;
        $config['password'] = $this->db->password;
        $config['database'] = $characters_db;
        $config['dbdriver'] = "mysql";
        $config['dbprefix'] = "";
        $config['pconnect'] = FALSE;
        $config['db_debug'] = TRUE;
        $config['cache_on'] = FALSE;
        $config['cachedir'] = "";
        $config['char_set'] = "utf8";
        $config['dbcollat'] = "utf8_general_ci";
        
        $this->characters = $this->load->database($config, TRUE);  
        
        $this->characters->select('guid');
        $this->characters->where('online', '1');
        
        $query = $this->characters->get('characters');
        
        return $query->num_rows();
    }

    function show_realms_status()
    {
        if ($this->auto->realms_info == NULL)
        {
            return;
        }
        
        $cont = '';
        if(count($this->auto->realms_info) > 0)
        {            
            $i='0';
            
            foreach ($this->auto->realms_info as $row)
            {
                $i++;
                $cont[$i]['realm_id'] = $row['id'];
                $cont[$i]['realm_name'] = $this->limit_string($row['name'], '35');
                $cont[$i]['realm_online_players'] = ($this->test_serv($row['address'], $row['port'])) ? $this->select_online_characters($row['char_db']).' / '.$row['p_limit'] : 'Offline';
            }
        }
        
        return $cont;
    }
}
