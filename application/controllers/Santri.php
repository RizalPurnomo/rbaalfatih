<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct(){
    parent::__construct();
    //chek_session();
		// if(!empty($this->session->userdata("username"))) {
		// 	redirect("home/dashboard");
		// 	die();
		// }else{
    //   redirect("home");
    // }    
		$this->load->model(array('santri_model','kelas_model'));
  }

	public function index(){
    $data['santri'] = $this->santri_model->getAllSantri();
    $data['kelas']      = $this->kelas_model->getAllKelas();
		$this->load->view('master/view_santri',$data);
  }
    
  function add() {      
    $data['idSantri']   = $this->santri_model->getidSantri(date('y')); 
    $data['kelas']      = $this->kelas_model->getAllKelas();
    $this->load->view('master/view_santri_add',$data);
  } 

  function edit($idSantri){
    if(isset($idSantri)) {
        $data['santri']     = $this->santri_model->getSantriById($idSantri);
        $data['kelas']      = $this->kelas_model->getAllKelas();
    }
  
    $this->load->view('master/view_santri_edit',$data);   
  }     

  function delete($idSantri){
    if(isset($idSantri)) {
        $this->santri_model->deleteData($idSantri,"tblsantri");
    }               
    return "Data Berhasil Di Delete";
  }    

  public function saveSantri(){
    $santri = $this->input->post('santri');
    $this->santri_model->saveData($santri,'tblsantri');
    print_array($this->input->post());   		
  }    

  public function editSantri($idSantri){
    $santri = $this->input->post('santri');
    $this->santri_model->editData($idSantri,$santri,'tblsantri');
    print_array($this->input->post());
  }    

  public function getMaxSantri(){
    $idSantri = $this->santri_model->getidSantri(date('y')); 
    echo $idSantri;
  }  
  
  function get_autocomplete(){
    if (isset($_GET['term'])) {
        $result = $this->santri_model->search_nama($_GET['term']);
        if (count($result) > 0) {
        foreach ($result as $row)
            $arr_result[] = $row->idSantri . " || " . $row->Nama;
            echo json_encode($arr_result);
        }
    }
  }   
    
}

// $ eval `ssh-agent -s`
// Agent pid 7588

