<?php

class Membership_model extends CI_Model{
	
	var $table = 'members';
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function validate(){

		$this->db->from('members');
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get();
		
		if($query->num_rows() == 1){

			return true;
		}
	}

	function create_member(){
		$data = array(

			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'emailid' => $this->input->post('email_address'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);


		$this->db->insert('members',$data);
		return $this->db->insert_id();
	}
	
	public function get_profile_by_email($emailid)
	{
		$this->db->from($this->table);
		$this->db->where('emailid',$emailid);
		$query = $this->db->get();
	
		return $query;
	}
}