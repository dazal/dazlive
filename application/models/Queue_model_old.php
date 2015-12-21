<?php
class Queue_model extends CI_Model {

	
	function getAllCustomerAppointments() {
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query('SELECT appnts.id, queue.appointment_id, max(status) maxstatus,title, modifiedtime mtime FROM 
			Queue_Details queue RIGHT JOIN Appointments appnts on queue.appointment_id = appnts.id where date(appnts.start) =  current_date

			group by id order by id, mtime');
		


		return $query->result_array();
	}

	function updateQueueDetails($data) 
	{	
		//$this->load->database();
		//$query = $this->db->query("insert into Queue_Details values('$appointmentId','$status',now())");
		$this->db->insert('Queue_Details', $data);
        return $this->db->insert_id();			
	}
}
?>