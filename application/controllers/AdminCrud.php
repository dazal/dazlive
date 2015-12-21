<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class AdminCrud extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */ 
 
        $this->load->library('grocery_CRUD');
 
    }
 
    public function index()
    {
        echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
        die();
    }
 
    public function appointments()
    {
        $this->grocery_crud->set_table('appointment');
        $output = $this->grocery_crud->render();
        $this->_example_output($output); 
        
    }
    public function branch()
    {
        $this->grocery_crud->set_table('branch');
        $output = $this->grocery_crud->render();
        $this->_example_output($output); 
        
    }
    public function brand()
    {
        $this->grocery_crud->set_table('brand');
        $output = $this->grocery_crud->render();
        $this->_example_output($output); 
        
    }
    
     public function review()
    {
        $this->grocery_crud->set_table('review');
        $output = $this->grocery_crud->render();
        $this->_example_output($output); 
        
    }
     public function Service()
    {
        $this->grocery_crud->set_table('service');
        $output = $this->grocery_crud->render();
        $this->_example_output($output); 
        
    }
     public function user()
    {
        $this->grocery_crud->set_table('user');
        $output = $this->grocery_crud->render();
        $this->_example_output($output); 
        
    }
     public function voucher()
    {
        $this->grocery_crud->set_table('voucher');
        $output = $this->grocery_crud->render();
        $this->_example_output($output); 
        
    }
    public function _example_output($output = null)
 
    {
        $this->load->view('grocery_crud_template.php',$output);    
    }
}