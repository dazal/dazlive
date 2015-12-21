<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
       	$this->is_logged_in();
        $this->load->model('profile_model','profile');

    }
 
 

	public function index(){

		$data['pageName']='Profile';
		$data['pageLink']='profile';
        $data['username']=$this->session->userdata('username');
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		$data['profiledata'] = $this->get_profile();
		$this->load->view('profile_view', $data);
		$this->load->view('messages');
		$this->load->view('footer',$data);
	}

	public function show_form(){

		$data['pageName']='Profile';
		$data['pageLink']='profile';
        $data['username']=$this->session->userdata('username');
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		//$data['profiledata'] = $this->get_profile();
		//$this->load->view('profile_view', $data);
		$this->load->view('messages');
		$this->load->view('footer',$data);
	}

	function get_profile(){

		$data = $this->session->userdata('username');
		$a = $this->profile->get_profile($data);
		return $a;

	}


	function update(){

		$this->load->library("form_validation");
		
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');		
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');		
		$this->form_validation->set_rules('emailid', 'Email Address', 'trim|required|valid_email');	
		$this->form_validation->set_rules('phoneno', 'Phone Number', 'trim|required|min_length[10]');		
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');		
		//$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');	
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE){

			//$this->session->set_flashdata('flashSuccess', 'Profile Updated Successfully');
			$this->index();

		} else {

				   	 $data = array(
				    'first_name' => $this->input->post('first_name'),
		            'last_name' => $this->input->post('last_name'),
		            'emailid' => $this->input->post('emailid'),
		            'phoneno' => $this->input->post('phoneno'),
		            'address1' => $this->input->post('address1'),
		            'address2' => $this->input->post('address2'),
		            'city' => $this->input->post('city'),
		            'state' => $this->input->post('state'),
		            'postal_code' => $this->input->post('postal_code'),
		            'country' => $this->input->post('country'),
		        
		        );

		   	 //update table
			$return = $this->profile->update_profile(array('username' => $this->session->userdata('username')),$data);
			//$this->session->set_flashdata('flashSuccess', 'Profile'+ $this->session->userdata('username')+' successfully update !');
			//$msg = 'Profile ' + ' ' + $this->session->userdata('username') + ' Updated Successfully ';
			$this->session->set_flashdata('flashSuccess', 'Profile Updated Successfully');
			redirect("/dashboard", "refresh");
		}

	}


	public function show_cp(){

		$data['pageName']='Change Password';
		$data['pageLink']='change';
        $data['username']=$this->session->userdata('username');
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		$data['profiledata'] = $this->get_profile();
		$this->load->view('cp_form', $data);
		$this->load->view('footer',$data);
	}


	function change_pwd(){
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules('password', 'Current Password', 'trim|required');		
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');		
		$this->form_validation->set_rules('confirm_new_password', 'Confirm New Password', 'trim|required|matches[new_password]');		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE){
			
			$this->show_cp();

		} else {
			   	 
			$return = $this->profile->check_current_password();
			
			if(!$return){
				
				echo "The return value is false";
				$this->session->set_flashdata('flashError', 'Current password you enterd doenst match!!!');
				$this->show_cp();
				//	die();
			}else{

				//echo "The return value is true";
				$data = array(
				    'password' => md5($this->input->post('new_password')),
		        	);
				//echo "Updateing table done";
			   	 //update table
				$return = $this->profile->update_profile(array('username' => $this->session->userdata('username')),$data);
				//$this->session->set_flashdata('flashSuccess', 'Profile'+ $this->session->userdata('username')+' successfully update !');
				//$msg = 'Profile ' + ' ' + $this->session->userdata('username') + ' Updated Successfully ';
				//echo "setting data";
				$this->session->set_flashdata('flashSuccess', 'Password updated successfully, please login with your new password');
				redirect("/login/logout");

			}

		}

	}

    function is_logged_in(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in!= true){

            $this->load->view('login_form');

        }
    }
}