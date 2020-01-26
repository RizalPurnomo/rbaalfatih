<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model(array('test_model'));
    }

    public function index(){
      $this->load->view('view_test');
    }

    public function getUser(){
        $data = $this->test_model->getUser();
        echo json_encode($data);
        // print_array($data);
    }
    
}
