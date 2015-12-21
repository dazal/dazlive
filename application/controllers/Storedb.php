<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Storedb extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->load->model('Storedb_model','storedb');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('storedb_view');
    }
 
    public function ajax_list()
    {
        $list = $this->storedb->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $storedb) {
            $no++;
            $row = array();
            $row[] = $storedb->salon_id;
            $row[] = $storedb->salon_name;
            $row[] = $storedb->brand_id;
            $row[] = $storedb->contact_number;
            $row[] = $storedb->tin_number;
            $row[] = $storedb->address;
            $row[] = $storedb->salon_type;
            $row[] = $storedb->amenities;
 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_store('."'".$storedb->salon_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_store('."'".$storedb->salon_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->storedb->count_all(),
                        "recordsFiltered" => $this->storedb->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->storedb->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        
        $data = array(
                'brand_id'=>1,
                //'salon_type_id'=>1,
                'salon_name' => $this->input->post('salon_name'),
                'contact_number' => $this->input->post('contact_number'),
                'tin_number' => $this->input->post('tin_number'),
                'address' => $this->input->post('address'),
                'salon_type_id' => $this->input->post('salon_type_id'),
                'amenities' => $this->input->post('amenities'),

            );
/*                $data = array(
                'brand_id'=>1,
                'salon_type_id'=>1,
                'salon_name' => "Naturals mine",
                'contact_number' => "983749327498",
                'tin_number' => "283489328948923",
                'address' => "skjsdklfjsldkfjsdlkfjlskdfjsklfjsjfsklfjksjfksjflsjfl",
                'amenities' => "fkljdkfl",

            );
*/
        $insert = $this->storedb->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'brand_id'=>1,
                'salon_name' => $this->input->post('salon_name'),
                'contact_number' => $this->input->post('contact_number'),
                'tin_number' => $this->input->post('tin_number'),
                'address' => $this->input->post('address'),
                'salon_type_id' => $this->input->post('salon_type_id'),
                'amenities' => $this->input->post('amenities'),
            );
/*
               $data = array(
                'brand_id'=>1,
                'salon_type_id'=>1,
                'salon_name' => "Naturals mine",
                'contact_number' => "983749327498",
                'tin_number' => "283489328948923",
                'address' => "addresss",
                'amenities' => "fkljdkfl",

            );*/
             //  $this->storedb->update(array(6),$data);
        $this->storedb->update(array('salon_id' => $this->input->post('salon_id')),$data);

        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->storedb->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 

        if($this->input->post('salon_name') == '')
        {
            $data['inputerror'][] = 'salon_name';
            $data['error_string'][] = 'Salon Name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('tin_number') == '')
        {
            $data['inputerror'][] = 'tin_number';
            $data['error_string'][] = 'TIN# is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('contact_number') == '')
        {
            $data['inputerror'][] = 'contact_number';
            $data['error_string'][] = 'Contact Number is required';
            $data['status'] = FALSE;
        }

      
         if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}