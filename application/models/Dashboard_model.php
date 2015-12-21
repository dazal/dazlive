<?php
class Dashboard_model extends CI_Model 
{
	function getVisitorDataNew()
	{
		
		$arr[]=null;
		$malecount=0;
		$femalecount=0;
		$kidcount=0;
		$totalcount=0;
		$q1=$this->db->query("select app_services from appointment");

		log_message('info','inside getVisitorDataNew');
		
		if($q1->num_rows() > 0)
		{
			foreach ($q1->result() as $rows)
			{
				log_message('info',"select type,count(*) count from service where service_id in (".$rows->app_services.") group by type");
				if(! empty($rows->app_services))
				{
				$q2 = $this->db->query("select type,count(*) count from service where service_id in (".$rows->app_services.") group by type");
				foreach ($q2->result() as $row) {
					//$data[] = $row;
					log_message('error',"".$row->type);
					log_message('error',"".$row->count);
					if($row->type == "M")
					{
						$malecount=$malecount+$row->count;
						$totalcount=$totalcount+1;
					}						
					else if($row->type == "F")
					{
						$femalecount=$femalecount+$row->count;
						$totalcount=$totalcount+1;
					}
					else if ($row->type == "K")
					{
						$kidcount=$kidcount+$row->count;
						$totalcount=$totalcount+1;
					}
					
				}
			}
							
			}
			$data["visitorMaleCount"]=$malecount;
			$data["visitorFemaleCount"]=$femalecount;
			$data["visitortotalCount"]=$totalcount;
			$data["visitorKidCount"]=$kidcount;
			log_message('info',"Malecount".$data['visitorMaleCount']);
			log_message('info',"Femalecount".$data['visitorFemaleCount']);
			log_message('info',"visitortotalCount".$data['visitortotalCount']);
			log_message('info',"visitorKidCount".$data['visitorKidCount']);
			return $data;
		}
	}

	function getVisitorData()
	{
		//$q = $this->db->query(" SELECT sum(case when sex = 'Male' then 1 else 0 end ) males, sum(case when sex = 'Female' then 1 else 0 end ) females, count(*) total FROM  user");
		//$q = $this->db->query(" select sex,sum(adults) count from user group by sex");
		
		//$q = $this->db->query("select sex,sum(adults) adultscount,sum(kids) kidscount from user group by sex");
		$q = $this->db->query("select type,count(*) count from service group by type");
		log_message('error',$q->num_rows());
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) {
				$data[] = $row;
				//log_message('error',"".$row->type);
				//log_message('error',"".$row->count);
				
			}
			
			return $data;
		}
	}

	function getSalesData()
	{
		
		//$q = $this->db->query(" SELECT sum(case when sex = 'Male' then 1 else 0 end ) males, sum(case when sex = 'Female' then 1 else 0 end ) females, count(*) total FROM  user");
		//$q = $this->db->query(" select sex,sum(adults) count from user group by sex");
		
		//$q = $this->db->query("select sex,sum(adults) adultscount,sum(kids) kidscount from user group by sex");
		$q = $this->db->query("select type,sum(exact_price) price from service group by type");
		log_message('error',$q->num_rows());
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) {
				$data[] = $row;
				// log_message('error',"".$row->type);
				// log_message('error',"".$row->price);
				
			}
			
			return $data;
		}
	}
	
	function getSalesDataNew()
	{
		$malesalecount=0;
		$femalesalecount=0;
		$kidsalecount=0;
		$totalsalecount=0;
		$q1=$this->db->query("select appointment_id, app_services from appointment");

		log_message('info','inside getVisitorDataNew');
		
		if($q1->num_rows() > 0)
		{
			foreach ($q1->result() as $rows)
			{
				log_message('info',"select type,count(*) count from service where service_id in (".$rows->app_services.") group by type");
				if(! empty($rows->app_services))
				{
				$q2 = $this->db->query("select type,count(*) count from service where service_id in (".$rows->app_services.") group by type");
				foreach ($q2->result() as $row) {
					//$data[] = $row;
					$q3 = $this->db->query("select amount from transaction where appointment_id=".$rows->appointment_id);
					foreach($q3->result() as $row1)
					{
					
					log_message('error',"".$row->type);
					log_message('error',"".$row->count);
					if($row->type == "M")
					{
						$malesalecount=$malesalecount+$row1->amount;
						
					}						
					else if($row->type == "F")
					{
						$femalesalecount=$femalesalecount+$row1->amount;
						
					}
					else if ($row->type == "K")
					{
						$kidsalecountcount=$kidsalecount+$row1->amount;
						
					}
					$totalsalecount=$totalsalecount+$amount;
					}
				}
			}
							
			}
			$data["salemalecount"]=$malesalecount;
			$data["salefemalecount"]=$femalesalecount;
			$data["saletotalcount"]=$totalsalecount;
			$data["salekidcount"]=$kidsalecount;
			log_message('info',"saleMalecount".$data['salemalecount']);
			log_message('info',"saleFemalecount".$data['salefemalecount']);
			log_message('info',"saletotalCount".$data['saletotalcount']);
			log_message('info',"saleKidCount".$data['salekidcount']);
			return $data;
		}
	}


	function getAppointmentByMonth()
	{
		
		//$q = $this->db->query(" SELECT sum(case when sex = 'Male' then 1 else 0 end ) males, sum(case when sex = 'Female' then 1 else 0 end ) females, count(*) total FROM  user");
		//$q = $this->db->query(" select sex,sum(adults) count from user group by sex");
		
		//$q = $this->db->query("select sex,sum(adults) adultscount,sum(kids) kidscount from user group by sex");
		//$q = $this->db->query("select MONTHNAME(date(FROM_UNIXTIME(start_time/1000))) month,count(*) count from appointment group by  month");
		$q = $this->db->query("select MONTHNAME (date(start_time)) month,count(*) count from appointment group by month order by month");
		//log_message('error',"Regular:".$q->num_rows());
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) {
				$data[] = $row;
				//log_message('error',"xxx".$row->month);
				//log_message('error',"yyyyy".$row->count);
				
			}
			
			return $data;
		}
	}

	function getBillAmountData()
	{
		
		//$q = $this->db->query(" SELECT sum(case when sex = 'Male' then 1 else 0 end ) males, sum(case when sex = 'Female' then 1 else 0 end ) females, count(*) total FROM  user");
		//$q = $this->db->query(" select sex,sum(adults) count from user group by sex");
		
		//$q = $this->db->query("select sex,sum(adults) adultscount,sum(kids) kidscount from user group by sex");
		$q = $this->db->query("select transaction_type,sum(amount) amount from transaction group by transaction_type");
		log_message('error',"Regular:".$q->num_rows());
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) {
				$data[] = $row;
				//log_message('error',"xxx".$row->type);
				//log_message('error',"yyyyy".$row->amount);
				
			}
			
			return $data;
		}
	}

	function getVoucherByGender()
	{
		$arr[]=null;
		//$q = $this->db->query(" SELECT sum(case when sex = 'Male' then 1 else 0 end ) males, sum(case when sex = 'Female' then 1 else 0 end ) females, count(*) total FROM  user");
		$q = $this->db->query("select u.sex,count(*) count from user u , user_voucher uv where u.user_id = uv.user_id group by u.sex");
		log_message('error',$q->num_rows());
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) {
				$data[] = $row;
				log_message('error',"".$row->sex);
				log_message('error',"".$row->count);
			}
			
			return $data;
		}
	}
	

	function getBranchRating()
	{
		$arr[]=null;
		//$q = $this->db->query(" SELECT sum(case when sex = 'Male' then 1 else 0 end ) males, sum(case when sex = 'Female' then 1 else 0 end ) females, count(*) total FROM  user");
		$q = $this->db->query("select branch_id,name,average_rating from branch group by average_rating order by average_rating desc");
		log_message('error',$q->num_rows());
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) {
				$data[] = $row;
				log_message('error',"branch id".$row->branch_id);
				log_message('error',"name".$row->name);
				log_message('error',"rating".$row->average_rating);
			}
			
			return $data;
		}
	}

	
	function getWalkInVsRegularData()
	{
		
		//$q = $this->db->query(" SELECT sum(case when sex = 'Male' then 1 else 0 end ) males, sum(case when sex = 'Female' then 1 else 0 end ) females, count(*) total FROM  user");
		//$q = $this->db->query(" select sex,sum(adults) count from user group by sex");
		
		//$q = $this->db->query("select sex,sum(adults) adultscount,sum(kids) kidscount from user group by sex");
		$q = $this->db->query("SELECT sum(case when a.user_id = b.user_id and b.member = '1' then 1 else 0 end ) member, sum(case when a.user_id = b.user_id and b.member = '2' then 1 else 0 end ) nonmember FROM  appointment a,user b");
		log_message('error',"Regular:".$q->num_rows());
		if($q->num_rows() > 0)
		{
			foreach ($q->result() as $row) {
				$data[] = $row;
				// log_message('error',"xxx".$row->member);
				// log_message('error',"yyyyy".$row->nonmember);
				
			}
			
			return $data;
		}
	}

	
	function getvisitorByGender() {

		$domain_name='http://guest.salwartrends.com';
		//$domain_name='http://localhost';
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $domain_name.'/salon2/restapi.php/visitorByGender'
		    
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

		function getRegularVsNonRegular() {

		$domain_name='http://guest.salwartrends.com';
		//$domain_name='http://localhost';
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $domain_name.'/salon2/restapi.php/memberNonMember'
		    
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

		function getSalesByGender() {

		$domain_name='http://guest.salwartrends.com';
		//$domain_name='http://localhost';
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => $domain_name.'/salon2/restapi.php/salesByGender'
		    
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
}
?>