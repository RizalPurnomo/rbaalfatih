<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		chek_session();
    }

	public function index(){
		$this->load->view('dashboard');
		//echo $this->session->userdata('RealName');

	}

}
