<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Otp extends CI_Controller {
	
	
	        public function __construct()
        {
                parent::__construct();
                $this->load->model('otp_model');

        }

	public function index()
	{
		$this->load->view('Otp_view');
	}
	
	public function get()
	{	
	

		$id= $this->input->post('mobile');
		
		
		$data['mobile']=$this->otp_model->get_mobile();
		if($data['mobile']!=null)
		{
			$data['valid']='false';
			$this->session->set_flashdata('flashError', 'This Phone number already has an account !');
			redirect('/login');
				
		}
		else
		{
			$data['valid']='true';
			$otp=$this->otp_model->generate($id);
			$this->sendOTP($id,$otp);

			$this->session->set_flashdata('flashSuccess', 'One Time Password sent successfully !');
		}

		$this->load->view('Otp_view',$data);
	}
	
	public function sendOTP($mobile,$otp)
	{
		
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		
		$url='http://trans.kapsystem.com/api/v3/index.php?method=sms&api_key=A7dcd815d7c6ec0722cf743380a9d30a3&to='.$mobile.'&sender=DAZLAP&message=The%20OTP%20is%20'.$otp.'&format=json';
		
		curl_setopt($curl,CURLOPT_URL,$url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
		
		// Send the request & save response to $resp
		$resp = curl_exec($curl);
		// Close request to clear up some resources
		curl_close($curl);
		//return $resp;

		
	}
	
	public function validate()
	{	


		
		$valid_otp=$this->otp_model->validate();

		if($valid_otp!=null)
		{
		$this->load->view('signup_newform');

			
		}
		else
		{

		$this->load->view('login_form');

		}
		
	}
}