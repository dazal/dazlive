<?php
class Auditlogs_model extends CI_Model {

	function getAuditlogAll() {
		//log_message('error', 'Some variable did not contain a value.');
		$domain_name='http://guest.salwartrends.com';
		
		//$domain_name='http://localhost';
		
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $domain_name.'/salon2/restapi.php/audit'
		    
		));
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		//$response=http_get($domain.'/hello.php/getUsers');
		//echo $resp;
		$arr = json_decode($resp, true);
		return $arr;
		}

	function createAuditLog($data){

		$this->db->insert('Transaction_Auditlog', $data);
        return $this->db->insert_id();

	}	
}
?>