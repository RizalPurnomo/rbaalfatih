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
		//chek_session();	
		$this->load->model(array('user_model','santri_model','tabungan_model'));
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
		date_default_timezone_set('Asia/Jakarta');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$userdata = $this->user_model->getValidUser($username,$password);
		if ($userdata) {
			$this->session->set_userdata($userdata[0]);
			$login = array(
				"lastLogin" => date("Y-m-d H:i:s")
			);
			$this->user_model->updateLastLogin($username,$login,'tbluser');
			redirect('home/dashboard');
		}else{
			redirect('home');
		}
	}

	public function dashboard(){
		$data['santri'] = $this->santri_model->getSumSantri();
		$data['user'] = $this->user_model->getSumUser();
		$data['tabungan']	= $this->tabungan_model->getSaldoTabungan();
		$data['debet']	= $this->tabungan_model->getDebetTabungan();
		$data['kredit']	= $this->tabungan_model->getKreditTabungan();
		$this->load->view('dashboard',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}

