<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stores extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->is_logged_in();
       
    }
 


	public function index()
	{
		$data['pageName']='Stores';
		$data['pageLink']='stores';
		$data['username']=$this->session->userdata('username');
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('breadcrump_view',$data);
		$this->load->view('stores_view');
		$this->load->view('footer',$data);
	}


	function is_logged_in(){

   		 $is_logged_in = $this->session->userdata('is_logged_in');

	    if(!isset($is_logged_in) || $is_logged_in!= true){

	        redirect ('/login', 'refresh');

	    }
	}	
}