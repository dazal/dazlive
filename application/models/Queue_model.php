<?php
class Queue_model extends CI_Model {
	function getAllCustomerAppointments($selectedDay) {
		$this->load->database();
		$this->load->library('table');
		$query = $this->db->query("SELECT appnts.id, queue.appointment_id, max(status) maxstatus,title, modifiedtime mtime,start,end,date_format(start,'%H:%i') startTime ,date_format(end,'%H:%i') endTime FROM 
				Queue_Details queue RIGHT JOIN Appointments appnts on queue.appointment_id = appnts.id where date(appnts.start) = str_to_date('$selectedDay','%d/%m/%Y') group by id order by id, mtime");				
		return $query->result_array();
	}

	function updateQueueDetails($data) {	
		$this->db->insert('Queue_Details', $data);
        return $this->db->insert_id();			
	}
}
?>