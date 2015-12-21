<?php
class Profile_model extends CI_Model {

	var $table = 'members';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    public function get_profile($username)
    {
        $this->db->from($this->table);
        $this->db->where('username',$username);
        $query = $this->db->get();
 
        return $query->row();
    }


    public function update_profile($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function check_current_password(){

        $this->db->from('members');
        $this->db->where('username', $this->input->post('username'));
        $this->db->where('password', md5($this->input->post('current_password')));
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
}