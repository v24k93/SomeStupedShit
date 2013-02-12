<?php
class Login_model extends CI_Model
{
        function sha_password($username, $password)
        {
            $username = strtoupper($username);
            $password = strtoupper($password);
            return SHA1($username.':'.$password);
        }
        
        function get_account($username, $password)
        {
            $this->auth = $this->load->database('auth', TRUE); 
            $password = $this->sha_password($username, $password);
            $this->auth->where('username', $username);
            $this->auth->where('sha_pass_hash', $password);
            $query = $this->auth->get('account', '1');

            if($query->num_rows() != 1)
                return FALSE;
            
            return $query->row_array();
        }
        
        function _get_characters($id, $realm)
        {
            $this->load->database();
            $config['hostname'] = $this->db->hostname;
            $config['username'] = $this->db->username;
            $config['password'] = $this->db->password;
            $config['database'] = $realm['char_db'];
            $config['dbdriver'] = "mysql";
            $config['dbprefix'] = "";
            $config['pconnect'] = FALSE;
            $config['db_debug'] = TRUE;
            $config['cache_on'] = FALSE;
            $config['cachedir'] = "";
            $config['char_set'] = "utf8";
            $config['dbcollat'] = "utf8_general_ci";

            $this->characters = $this->load->database($config, TRUE); 
            
            $this->characters->select('guid, name, race, class, gender');
            $this->characters->where('account', $id);
            $query = $this->characters->get('characters');
           
            return $query->result_array();
        }
        
        function get_characters($id)
        {
            if(count($this->auto->realms_info) == 0)
                return array();
            
            $cont = array();
            
            $i = 0;
            
            foreach($this->auto->realms_info as $realm)
            {
                $i++;
                
                $cont[$i]['realm_name'] = $realm['name'];
                $cont[$i]['realm_id'] = $realm['id'];
                $cont[$i]['realm_characters'] = $this->_get_characters($id, $realm);
            }
            
            return $cont;
        }
        
        function insert_cms_data($id, $username)
        {
            $this->cms = $this->load->database('cms', TRUE);  

            $data = array(
                'id'        =>  $id,
                'username'  =>  $username,
                'date'      =>  date("Ymd")
            );
            $this->cms->insert('account_addition', $data);
        }
        
        function get_account_cms($id, $username)
        {
            $this->cms = $this->load->database('cms', TRUE); 
            $this->cms->where('id', $id);
            $query = $this->cms->get('account_addition', '1');

            if($query->num_rows() != 1)
            {
                $this->insert_cms_data($id, $username);
                $this->get_account_cms($id, $password);
            }
            
            return $query->row_array();
        }
        
        function get_user_gmlevel($id)
        {
            $this->auth = $this->load->database('auth', TRUE); 
            $this->auth->select('gmlevel');
            $this->auth->where('id', $id);
            $query = $this->auth->get('account_access', '1');
            
            if($query->num_rows() == 1)
            {
                $row = $query->row_array();
                
                return $row[0];
            }
            else
                return 0;
        }
}
?>