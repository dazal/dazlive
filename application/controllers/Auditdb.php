<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auditdb extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auditdb_model','auditdb');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('auditdb_view');
    }

    public function ajax_list()
    {
        $list = $this->auditdb->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $auditdb) {
            $no++;
            $row = array();
            $row[] = $auditdb->Timestamp;
            $row[] = $auditdb->ActorID;
            $row[] = $auditdb->SalonID;
            $row[] = $auditdb->Module;
            $row[] = $auditdb->TransType;
            $row[] = $auditdb->Description;
            $row[] = $auditdb->OldValue;
            $row[] = $auditdb->NewValue;         
            $data[] = $row;

        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->auditdb->count_all(),
                        "recordsFiltered" => $this->auditdb->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
}