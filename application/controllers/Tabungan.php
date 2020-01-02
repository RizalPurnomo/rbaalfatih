<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan extends CI_Controller {

	public function __construct(){
    parent::__construct();
    //chek_session();
		// if(!empty($this->session->userdata("username"))) {
		// 	redirect("home/dashboard");
		// 	die();
		// }else{
    //   redirect("home");
    // }   
		$this->load->model(array('santri_model','kelas_model','tabungan_model'));
  }

    public function index(){
      $data['tabungan'] = $this->tabungan_model->getAllTabungan();
      //$data['kelas']      = $this->kelas_model->getAllKelas();
      
		  $this->load->view('tabungan/view_tabungan',$data);
    }
    
  function add() {      
    $data['idTabungan']   = $this->tabungan_model->getidTabungan(date('y')); 
    $data['santri'] = $this->santri_model->getAllSantri();
    $this->load->view('tabungan/view_tabungan_add',$data);
  } 

  function edit($idTabungan){
    if(isset($idTabungan)) {
        $data['santri']       = $this->santri_model->getAllSantri();
        $data['tabungan']     = $this->tabungan_model->getTabunganById($idTabungan);
    }
    $this->load->view('tabungan/view_tabungan_edit',$data);   
  }     

  function delete($idTabungan){
    if(isset($idTabungan)) {
        $this->tabungan_model->deleteData($idTabungan,"tbltabungan");
    }               
    return "Data Berhasil Di Delete";
  }    

  public function saveTabungan(){
    $tabungan = $this->input->post('tabungan');
    $this->tabungan_model->saveData($tabungan,'tbltabungan');
    print_array($this->input->post());   		
  }    

  public function editTabungan($idTabungan){
    $tabungan = $this->input->post('tabungan');
    $this->tabungan_model->editData($idTabungan,$tabungan,'tbltabungan');
    print_array($this->input->post());
  }    

  public function getMaxTabungan(){
    $idTabungan = $this->tabungan_model->getidTabungan(date('y')); 
    echo $idTabungan;
  }     

  public function laporan(){
    $this->load->view('tabungan/view_lap_tabungan');
  }  
    
}

// $ eval `ssh-agent -s`
// Agent pid 7588

