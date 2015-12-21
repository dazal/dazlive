<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Servicedb extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Servicedb_model','servicedb');
    }
 
    public function index()
    {
        $this->load->helper('url');
        $this->load->view('servicedb_view');
    }
 
    public function ajax_list()
    {
        $list = $this->servicedb->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $servicedb) {
            $no++;
            $row = array();
            $row[] = $servicedb->brand_id;
            $row[] = $servicedb->service_id;
            $row[] = $servicedb->name;
            $row[] = $servicedb->type;
            $row[] = $servicedb->exact_price;
            $row[] = $servicedb->duration;

 
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_service('."'".$servicedb->service_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_service('."'".$servicedb->service_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
         
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->servicedb->count_all(),
                        "recordsFiltered" => $this->servicedb->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->servicedb->get_by_id($id);
        //$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'brand_id' => 2,
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'exact_price' => $this->input->post('exact_price'),
                'min_rate' => $this->input->post('min_price'),
                'max_rate' => $this->input->post('max_price'),
                'duration' => $this->input->post('duration'),

            );
        $insert = $this->servicedb->save($data);

        $this->session->set_flashdata('flashSuccess', 'Service'+$data['name']+' successfully added !');
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                //'brand_id' => 1,
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                'exact_price' => $this->input->post('exact_price'),
                'min_rate' => $this->input->post('min_price'),
                'max_rate' => $this->input->post('max_price'),
                'duration' => $this->input->post('duration'),
            );
        $this->servicedb->update(array('service_id' => $this->input->post('service_id')),$data);

        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->servicedb->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
 
        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'Servive Name is required';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('type') == '')
        {
            $data['inputerror'][] = 'type';
            $data['error_string'][] = 'Please select Service Type';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('exact_price') == '')
        {
            $data['inputerror'][] = 'exact_price';
            $data['error_string'][] = 'Exact Price is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
 
}