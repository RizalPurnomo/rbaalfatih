<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//chek_session();
		$this->load->model(array('kelas_model','user_model'));
    }

	public function index(){
		$data['kelas'] = $this->kelas_model->getAllKelas();
		$this->load->view('master/view_kelas',$data);
	} 
		
	function add() {      
		$data['idKelas'] 	= $this->kelas_model->getidKelas(date('y')); 
		$data['user']		= $this->user_model->getAllUser();
		$this->load->view('master/view_kelas_add',$data);
	} 

	function edit($idKelas){
		if(isset($idKelas)) {
			$data['kelas']      = $this->kelas_model->getKelasById($idKelas);
			$data['user']		= $this->user_model->getAllUser();
		}
		
		$this->load->view('master/view_kelas_edit',$data);   
	}     

	function delete($idKelas){
		if(isset($idKelas)) {
			$this->kelas_model->deleteData($idKelas,"tblkelas");
		}               
		return "Data Berhasil Di Delete";
	}    

	public function saveKelas(){
		$kelas = $this->input->post('kelas');
		$this->kelas_model->saveData($kelas,'tblkelas');
		print_array($this->input->post());   		
	}    

	public function editKelas($idKelas){
		$kelas = $this->input->post('kelas');
		$this->kelas_model->editData($idKelas,$kelas,'tblkelas');
		print_array($this->input->post());
	}    

	public function getMaxKelas(){
		$idKelas = $this->kelas_model->getidKelas(date('y')); 
		echo $idKelas;
	}     
	
    
}


