<?php
class otp_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_mobile()
{
	
	
			$this->db->from('userotp');
		$this->db->where('MobileNumber', $this->input->post('mobile'));
		//$this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get();
		
		//if($query->num_rows() == 1){

		
			return $query->row();
		//}
}
				public function generate()
{
	$data = array(
'MobileNumber' => $this->input->post('mobile'),
'OTP' => rand(100000,999999)
);
	
			$this->db->insert('userotp', $data);
		return $data['OTP'];
}

				public function validate()
{
	
	
		$this->db->from('userotp');
		$this->db->where('MobileNumber', $this->input->post('mobile'));
		$this->db->where('OTP', $this->input->post('otp'));
        $query = $this->db->get();
		
		//if($query->num_rows() == 1){

		
			return $query->row();	
}

}

?>