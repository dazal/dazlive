<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
        $this->load->model('appointments_model','appointments');
    }
 
 

	public function index(){

		$data['pageName']='Appointments';
		$data['pageLink']='appointments';
        	$data['username']=$this->session->userdata('username');
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		$this->load->view('appointments_view');
		$this->load->view('footer',$data);
	}

    public function create(){

        $data['pageName']='Appointments';
        $data['pageLink']='appointments';
        $this->load->view('header',$data);
        $this->load->view('menu',$data);
        $this->load->view('breadcrump_view',$data);
        //$this->load->view('calendar_view');
        $this->load->view('sample');
        $this->load->view('footer',$data);
    }

	public function getEventList(){
		$this->load->model('appointments_model');
		if($this->session->userdata('role_name') == "Admin")
		{
			$events = $this->appointments_model->get_all_appointments();
		}
		else 
		{			
			$events = $this->appointments_model->get_all_appointmentsbyuser($this->session->userdata('username'));
		}
		echo $events;
	}

	public function getEventById($id){

		$data = $this->appointments->get_by_id($id);
		echo json_encode($data);
	}

	public function add(){
		//$this->_validate();
		$app_type=$this->input->post('app_type');
		$color='#AAAAAA';
		if($app_type==1)
		{
			$color='#FFC40D';
		}
		else if ($app_type==2){
			$color='#AAC40D';
		}
	
		$data = array(
				
			'user_id'=>	$this->session->userdata('user_id'),
			'branch_id' => 1, 
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'),
			'is_cancelled' => 0,
			'is_confirmed' => 0,
			'created_date' => date("Y/m/d"),
			'created_by' => $this->session->userdata('username'),
			'member_username' => $this->session->userdata('username')			
				
			//'allDay' => 'false',
			//'backgroundColor' => $color
			);

		$insert = $this->appointments->add_appointments($data);
		echo json_encode(array("status" => TRUE));

	}

    public function update()
    {
       //$this->_validate();
 		$data = array(
			'user_id' => $this->input->post('customer_name'), 
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'),
			'update_date' => date("Y/m/d"),
			'updated_by' => $this->session->userdata('username'),
			//'allDay' => 'false',
			);
        $this->appointments->update(array('appointment_id' => $this->input->post('id')),$data);

        echo json_encode(array("status" => TRUE));
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
 
        if($this->input->post('customer_name') == '')
        {
            $data['inputerror'][] = 'customer_name';
            $data['error_string'][] = 'Customer Name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('start_time') == '')
        {
            $data['inputerror'][] = 'start_time';
            $data['error_string'][] = 'Start Time is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('end_time') == '')
        {
            $data['inputerror'][] = 'end_time';
            $data['error_string'][] = 'End Time is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    function is_logged_in(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in!= true){

            redirect ('/login', 'refresh');

        }
    }
}