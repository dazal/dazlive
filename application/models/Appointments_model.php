<?php
class Appointments_model extends CI_Model {

	var $table = 'appointment';
   // var $column = array('brand_id','service_id','name','exact_price','duration', 'min_rate', 'max_rate'); //set column field database for order and search
    //var $order = array('service_id' => 'desc'); // default order

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function get_all_appointments(){

		$query = $this->db->query(
				
				'SELECT `appointment_id` as id, `user_id` as title, `branch_id`, `start_time` as start, `is_cancelled`, `is_confirmed`, `app_services`, `created_date`, `update_date`, `end_time` as end, `created_by`, `updated_by`, `member_username` FROM `appointment` '		
				);
		return json_encode($query->result());	
	}

	function get_all_appointmentsbyuser($username){

	    log_message('info',"&&&&&&&&&&&&&& SELECT appointment_id as id, user_id as title, branch_id, start_time as start, is_cancelled, is_confirmed, app_services, created_date, update_date, end_time as end, created_by, updated_by, member_username FROM appointment 	where member_username ='".$username."'");
		$query = $this->db->query(
				
				"SELECT appointment_id as id, user_id as title, branch_id, start_time as start, is_cancelled, is_confirmed, app_services, created_date, update_date, end_time as end, created_by, updated_by, member_username FROM appointment 	where member_username ='".$username."'"		
				);
		return json_encode($query->result());	
	}

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('appointment_id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }


	function add_appointments($data){
		
		$this->db->insert('appointment', $data);
        return $this->db->insert_id();
	}

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }


}

?>
