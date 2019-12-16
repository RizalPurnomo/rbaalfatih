<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('user_model'));
    }

	public function index(){
    $data['user'] = $this->user_model->getAlluser();
		$this->load->view('master/view_user',$data);
    }
    
    function add() {      
      $data['idUser'] = $this->user_model->getIdUser(date('y')); 
      $this->load->view('master/view_user_add',$data);
    } 

    function edit($iduser){
      if(isset($iduser)) {
          $data['user']      = $this->user_model->getuserById($iduser);
      }
      //print_array($data);
      $this->load->view('master/view_user_edit',$data);   
    }     

    function delete($iduser){
      if(isset($iduser)) {
          $this->user_model->deleteData($iduser,"tbluser");
      }               
      return "Data Berhasil Di Delete";
    }    

    public function saveuser(){
      $user = $this->input->post('user');
      $this->user_model->saveData($user,'tbluser');
      print_array($this->input->post());   		
    }    

    public function edituser($iduser){
      $user = $this->input->post('user');
      $this->user_model->editData($iduser,$user,'tbluser');
      print_array($this->input->post());
    }    

    public function getMaxuser(){
      $iduser = $this->user_model->getiduser(date('y')); 
      echo $iduser;
    }     
    
}

// $ eval `ssh-agent -s`
// Agent pid 7588

