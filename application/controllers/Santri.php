<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('santri_model'));
    }

	public function index(){
    $data['santri'] = $this->santri_model->getAllSantri();
		$this->load->view('view_santri',$data);
    }
    
    function add() {      
      $data['idSantri'] = $this->santri_model->getidSantri(date('y')); 
      $this->load->view('view_santri_add',$data);
    } 

    public function saveSantri(){
      $santri = $this->input->post('santri');
      $this->santri_model->saveData($santri,'tblsantri');
      print_array($this->input->post());   		
    }    

    public function getMaxSantri(){
      $idSantri = $this->santri_model->getidSantri(date('y')); 
      echo $idSantri;
    }     
    
}

// $ eval `ssh-agent -s`
// Agent pid 7588

