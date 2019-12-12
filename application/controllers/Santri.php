<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('santri_model'));
    }

	public function index(){
		$this->load->view('view_santri');
    }
    
    function add() {      
        $this->load->view('view_santri_add');
    }    
}

// $ eval `ssh-agent -s`
// Agent pid 7588

