<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model(array('user_model'));
    }

	public function index(){
		//echo CI_VERSION;
		if(!empty($this->session->userdata("username"))) {
			redirect("home/dashboard");
			die();
		}
		$this->load->view('login');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$userdata = $this->user_model->getValidUser($username,$password);
		if ($userdata) {
			$this->session->set_userdata($userdata[0]);
			redirect('home/dashboard');
		}else{
			redirect('home');
		}
	}

	public function dashboard(){
		$this->load->view('dashboard');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}

