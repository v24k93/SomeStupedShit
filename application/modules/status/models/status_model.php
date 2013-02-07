<?php

class Status_model extends CI_Model
{
	public function __construct() 
        {
            parent::__construct();
        }

	function get_online_players($realm_info)
        {
            $this->load->database();
            $config['hostname'] = $this->db->hostname;
            $config['username'] = $this->db->username;
            $config['password'] = $this->db->password;
            $config['database'] = $realm_info['char_db'];
            $config['dbdriver'] = "mysql";
            $config['dbprefix'] = "";
            $config['pconnect'] = FALSE;
            $config['db_debug'] = TRUE;
            $config['cache_on'] = FALSE;
            $config['cachedir'] = "";
            $config['char_set'] = "utf8";
            $config['dbcollat'] = "utf8_general_ci";

            $this->characters = $this->load->database($config, TRUE);  

            $this->characters->select('guid, name, zone, level, class, race, latency, gender');
            $this->characters->where('online', '1');
            $query = $this->characters->get('characters');
            
            $cont = array();
            $zones = $this->Definitions->zones;
			
            if($query->num_rows()>'0')
            {
                $i = 0;
                foreach($query->result_array() as $row)
                {
                   $i++;
                   $cont[$i]['player_number'] = $i;
                   $cont[$i]['player_guid'] = $row['guid'];
                   $cont[$i]['player_name'] = '<a href="'.base_url('index.php/character/index/'.$row['guid'].'/'.$realm_info['id']).'" onmouseout="Tooltip.hide();" onmouseover="Tooltip.show(this, \''.$row['name'].' profile\');" >'.$row['name'].'</a>';
                   $cont[$i]['player_map'] = (isset($zones[$row['zone']])) ? $zones[$row['zone']] : 'Not Found';
                   $cont[$i]['player_level'] = $row['level'];
                   $cont[$i]['player_icons'] = '<img src="'.base_url('content/img/icon/class/'.$row['class']).'.gif" title="Class" />&nbsp;<img src="'.base_url('content/img/icon/race/'.$row['race'].'-'.$row['gender']).'.gif" title="Race" />';
                   $cont[$i]['player_latency'] = $row['latency'];
                }
            }
            return $cont;
        }
}
