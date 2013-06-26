<?php
class Register_model extends CI_Model
{
        function check_username($username)
        {
            $this->auth = $this->load->database('auth', TRUE); 
            $this->auth->where('username', $username);
            $query = $this->auth->get('account', '1');

            return $this->auth->affected_rows();
        }

        function check_email($email)
        {
            $this->auth = $this->load->database('auth', TRUE); 
            $this->auth->where('email', $email);
            $query = $this->auth->get('account', '1');

            return $this->auth->affected_rows();
        }   
        
        function sha_password($username, $password)
        {
            $username = strtoupper($username);
            $password = strtoupper($password);
            return SHA1($username.':'.$password);
        }
        
        function register_account($username, $password, $email)
        {
            $this->auth = $this->load->database('auth', TRUE); 
            $password = $this->sha_password($username, $password);
            $data = array(
                   'username' => $username,
                   'sha_pass_hash' => $password,
                   'email' => $email,
                   'expansion' => $this->config->item('expansion')
                );

            $this->auth->insert('account', $data);

            return $this->auth->affected_rows();
        }
        
        function get_session_username($username)
        {
            $this->auth = $this->load->database('auth', TRUE); 
            $this->auth->select('id, username');
            $this->auth->where('username', $username);
            $query = $this->auth->get('account', '1');

            return $query->row_array();
        }
        
        function add_addition_information($id, $username, $security_question, $security_answer)
        {
            $this->cms = $this->load->database('cms', TRUE);  
            $data = array(
                   'id' => $id,
                   'username' =>  $username,
                   'security_question' => $security_question,
                   'security_answer' => $security_answer
                );

            $this->cms->insert('account_addition', $data);

            return $this->cms->affected_rows();
        }
}
?>