<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Login extends CI_Controller {
	
	public function __construct() {
		parent::__construct ();
		
		$this->load->model ( 'Membership_model', 'membership' );
		$this->load->model ( 'Profile_model', 'profile' );
		$this->load->model ( 'Branch_model', 'branch' );
	}
	
	public function index() {
		$this->load->view ( "login_form" );
	}
	
	public function validate_credentials() {
		$this->load->library ( "form_validation" );
		$this->form_validation->set_rules ( 'username', 'Username', 'trim|required' );
		$this->form_validation->set_rules ( 'password', 'Password', 'trim|required|min_length[4]|max_length[32]' );
		
		$this->form_validation->set_error_delimiters ( '<div class="error">', '</div>' );
		
		// check for validation
		if ($this->form_validation->run () == FALSE) {
			// redirect('/login','refresh');
			$this->index ();
		} else {
			
			// Check user is valid and password is correct
			
			$query = $this->membership->validate ();
			
			if ($query) {
				
				$profile = $this->profile->get_profile($this->input->post ( 'username' ));
				$this->session->set_userdata ('role_name',$profile->role_name);
				$branch = $this->branch->get_branch($this->input->post ( 'username' ));
				//log_message('info',"%%%%%%%%%%%%%% Store name ".$branch->name);
				//log_message('info',"%%%%%%%%%%%%%% Store id ".$branch->branch_id);

				$data = array (
						
						'username' => $this->input->post ( 'username' ),
						'user_id' => $profile->id,
						'first_name' => $profile->first_name,
						'last_name' => $profile->last_name,
						'emailid' => $profile->emailid,
						'phoneno' => $profile->phoneno,
						'role_name' => $profile->role_name,
						'is_logged_in' => true 
				);
				
				$this->session->set_userdata ( $data );
				
				if($profile->role_name == "Admin")
				{
					$this->session->set_flashdata ( 'flashSuccess', 'Successful Login... Youll be directed to the Dashboard' );
					redirect ( '/dashboard' );
					
				}
				else 
				{
					$this->session->set_userdata ('branch_name',$branch->name);
					$this->session->set_userdata ('branch_id',$branch->branch_id);
					
					
					if(!(empty($branch->branch_id)))
					{
					$this->session->set_flashdata ( 'flashSuccess', 'Successful Login... Youll be directed to the Dashboard' );
					redirect ( '/dashboard' );
					}
					else
					{
						$this->session->set_flashdata ( 'flashSuccess', 'Successful Login... Youll be directed to the Stores please create a store' );
						redirect ( '/stores' );
					}
				}
			} else {
				// echo "not bad";
				// Display error message
				$this->session->set_flashdata ( 'flashError', 'Username/Password is invalid.' );
				redirect ( '/login' );
			}
		}
	}
	
	public function signup() {
		$this->load->view ( 'Otp_view' );
	}
	
	public function create_member() {
		$this->load->library ( "form_validation" );
		
		$this->form_validation->set_rules ( 'password', 'Password', 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules ( 'password', 'Password', 'trim|required|min_length[4]|max_length[32]' );
		$this->form_validation->set_rules ( 'password2', 'Password Confirmation', 'trim|required|matches[password]' );
		
		$this->form_validation->set_error_delimiters ( '<div class="error">', '</div>' );
		
		if ($this->form_validation->run () == FALSE) {
			
			$this->signup ();
		} else {
			
			$insert = $this->membership->create_member ();
			
			if ($insert) {
				
				redirect ( '/dashboard' );
			} else {
				
				$this->signup ();
			}
		}
	}
	
	function forgot() {
		
		$this->load->view ( 'forgot_view' );
		
		
	}
	
	function reset_password(){
	
		$this->load->library ( "form_validation" );
		$this->form_validation->set_rules ( 'emailid', 'Email', 'trim|required|valid_email' );
		$this->form_validation->set_error_delimiters ( '<div class="error">', '</div>' );
		
		
		
		// check for validation
		if ($this->form_validation->run () == FALSE) {

			$this->forgot();
			
			
		} else {
				
			// Check user is valid and password is correct
			$email= $_POST['emailid'];
			$query =  $this->membership->get_profile_by_email($email);
			if ($query->num_rows() > 0) {
				$r = $query->result();
				$user=$r[0];
				$this->resetpassword($user);
				$info= "Password has been reset and has been sent to email id: ". $email;
				$this->session->set_flashdata ( 'flashSuccess', 'Your new password has been emailed to you.' );
				redirect ( '/login' );

			}else{
			
				$error= "The email id you entered not found on our database ";
				$this->session->set_flashdata ( 'flashError', 'No user was found in the database for this email id ' );
				redirect('/login/forgot');
			}

		}	
		
	}
	
	private function resetpassword($user)
	{
		
		$email= $_POST['emailid'];
		date_default_timezone_set('GMT');
		$this->load->helper('string');
		$password= random_string('alnum', 16);
		$this->db->where('id', $user->id);
		$this->db->update('users',array('password'=>MD5($password)));
		$this->load->library('email');
		$this->email->from('cantreply@youdomain.com', 'Your name');
		$this->email->to($user->emailid);
		$this->email->subject('Password reset');
		$this->email->message('You have requested the new password, Here is you new password:'. $password);
		//$this->email->send();
		
		//echo "email sent";
	}
	
	
	function logout() {
		$this->session->sess_destroy ();
		$this->session->set_userdata ( array (
				'username' => '',
				'is_logged_in' => 0 
		) );
		log_message ( 'debug', 'Some variable was correctly set' );
		redirect ( '/login', 'refresh' );
	}
}

?>