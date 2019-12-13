<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('user_model'));
    }

	public function index(){
		$this->load->view('master/view_kelas');
    } 
    
}

// $ eval `ssh-agent -s`
// Agent pid 7588

