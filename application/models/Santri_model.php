<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	public function getValidUser($username,$password){
		$sql = "SELECT * FROM tbluser 
 				where user='".$username."' and password='".$password."'";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}

	public function saveData($data,$tabel){
		$this->db->insert($tabel, $data);   
	}  	

	public function getidSantri($thn){
		$idSantri="";
		$sql = "SELECT MAX(idSantri) AS maxSantri FROM tblsantri WHERE idSantri LIKE '$thn%'";
		$qry = $this->db->query($sql)->result_array();
		$maxSantri = $qry[0]['maxSantri'];
		//echo $maxRM;
		//exit;
		if (empty($maxSantri)) {
			$idSantri=$thn."001";
		}else{
			$maxSantri++;
			$idSantri = $maxSantri;
		}
		return $idSantri;      
	}	

	public function getAllSantri(){
		$sql = "SELECT * FROM tblsantri";
		$qry = $this->db->query($sql);
		return $qry->result_array();        
  	}	


}