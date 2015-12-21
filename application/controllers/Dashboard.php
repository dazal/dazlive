<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	  // calling the constructor
 	 public function __construct() {
    		parent::__construct();
    		$this->is_logged_in();

  	}

	public function index()
	{
		//$this->load->helper('url');
		//redirect('/dashboard/home');
		$this->load->helper('url');
		$data['pageName']='Dashboard';
		$data['pageLink']='dashboard';
		$this->load->model('Dashboard_model');
		$data['username']=$this->session->userdata('username');
		//$data['rows'] = $this->Dashboard_model->getvisitorByGender();
		$data['rows'] = $this->Dashboard_model->getvisitorDataNew();
		$data['values'] = $this->Dashboard_model->getWalkInVsRegularData();
		$data['sales'] = $this->Dashboard_model->getSalesDataNew();
		$data['bill'] = $this->Dashboard_model->getBillAmountData();
		$data['apptmonth'] = $this->Dashboard_model->getAppointmentByMonth();
		$data['voucher'] = $this->Dashboard_model->getVoucherByGender();
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		$this->load->view('dashboard_view',$data);
		$this->load->view('footer',$data);
		
	}
	
	public function home(){
	
		$data['pageName']='Dashboard';
		$data['pageLink']='dashboard';
		$this->load->model('Dashboard_model');
		$data['username']=$this->session->userdata('username');
		//$data['username']=$this->session->userdata('username');
		//$data['rows'] = $this->Dashboard_model->getvisitorByGender();
		$data['rows'] = $this->Dashboard_model->getvisitorDataNew();
		$data['values'] = $this->Dashboard_model->getWalkInVsRegularData();
		$data['sales'] = $this->Dashboard_model->getSalesDataNew();
		$data['bill'] = $this->Dashboard_model->getBillAmountData();
		$data['apptmonth'] = $this->Dashboard_model->getAppointmentByMonth();
		$data['voucher'] = $this->Dashboard_model->getVoucherByGender();
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		
		$this->load->view('dashboard_view',$data);
		$this->load->view('footer',$data);
		
		}
		public function getRatingData()
		{
		//log_message('error',"KKKKKK:"+"inside message");
		$this->load->model('Dashboard_model');
		$data['rating'] = $this->Dashboard_model->getBranchRating();
		
		echo json_encode($data);
		}
		public function getappointmentdata()
		{
		//log_message('error',"KKKKKK:"+"inside message");
		$this->load->model('Dashboard_model');
		$data['apptmonth'] = $this->Dashboard_model->getAppointmentByMonth();
		
		echo json_encode($data);
		}

		public function getbillamountdata()
		{
		//log_message('error',"KKKKKK:"+"inside message");
		$this->load->model('Dashboard_model');
		$data['billamount'] = $this->Dashboard_model->getBillAmountData();
		
		echo json_encode($data);
		}


		function is_logged_in(){

        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in!= true){

            redirect ('/login', 'refresh');

        }
    }
}