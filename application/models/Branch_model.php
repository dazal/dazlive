<?php
class Branch_model extends CI_Model {

	
	var $table = 'branch';


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


   
	public function get_branch($username)
    {
		log_message('info',"inside get_branch".$username);
        $this->db->from($this->table);
        $this->db->where('member_username',$username);
        $query = $this->db->get();
 
        return $query->row();
    }


}