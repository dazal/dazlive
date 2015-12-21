<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Queues extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->is_logged_in();
       
    }
 
	public function index()
	{	
		$data['pageName']='Queues';
		$data['pageLink']='queues';
		$data['username']=$this->session->userdata('username');
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		$this->load->model('Queue_model');
		$data['queryresult'] = $this->Queue_model->getAllCustomerAppointments();
		$data['checkedin']= array();
		$data['inservice']= array();
		$data['paymentdue']= array();
		$data['complete']= array();
		$data['appointments'] = array();
		foreach ($data['queryresult'] as $row) {
			if($row['maxstatus']!=NULL) {
				if($row['maxstatus'] == 100) {
					array_push($data['checkedin'],$row);
				}
				else if($row['maxstatus'] == 200) {
					array_push($data['inservice'],$row);
				}
				else if($row['maxstatus'] == 300) {
					array_push($data['paymentdue'],$row);
				}
				else if($row['maxstatus'] == 400) {
					array_push($data['complete'],$row);
				}
				else {
					array_push($data['appointments'],$row);
				}
			}
			else {
				array_push($data['appointments'],$row);
			}
		}
		$this->load->view('queues_view',$data);
		$this->load->view('footer',$data);
	}
	
	public function updateAppointments()
	{
		$appntId = $_POST['appointmentId'];
       		$status = $_POST['status'];
		$this->load->model('Queue_model');
		$data  = array(

			'appointment_id' => $appntId , 
			'status' => $status
		);
		$this->Queue_model->updateQueueDetails($data);

		if($status == 100){

			$this->session->set_flashdata('flashSuccess', 'Customer moved to Check-In Q successfully !');
		}
		if($status == 200){

			$this->session->set_flashdata('flashSuccess', 'Customer moved to Service Q successfully !');
		}

		if($status == 300){

			$this->session->set_flashdata('flashSuccess', 'Customer moved to Payment Q successfully !');
		}
		if($status == 400){

			$this->session->set_flashdata('flashSuccess', 'All services done !!!');
		}

		


		
	}

   function is_logged_in(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in!= true){

            redirect ('/login', 'refresh');

        }
    }	


    public function add(){
		$this->_validate();
		$data = array(
			'title' => $this->input->post('customer_name'), 
			'start' => $this->input->post('start_time'),
			'end' => $this->input->post('end_time'),
			'allDay' => 'false',
			);

		$insert = $this->appointments->add_appointments($data);
		$insert2  = $this->queues->add($data);
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


}