<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

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

	public function editData($id,$data,$tabel){ 
		$this->db->where('idUser', $id);
		$this->db->update($tabel, $data);
		return  "Data ".$id." Berhasil Diupdate";
	} 	

	public function deleteData($id,$tabel){
		$this->db->where('idUser', $id);
		$this->db->delete($tabel);
	} 	

	public function getIdUser($thn){
		$idUser="";
		$sql = "SELECT MAX(idUser) AS maxuser FROM tbluser WHERE idUser LIKE '$thn%'";
		$qry = $this->db->query($sql)->result_array();
		$maxuser = $qry[0]['maxuser'];
		//echo $maxRM;
		//exit;
		if (empty($maxuser)) {
			$idUser=$thn."001";
		}else{
			$maxuser++;
			$idUser = $maxuser;
		}
		return $idUser;      
	}	

	public function getAllUser(){
		$sql = "SELECT * FROM tbluser where level!='Administrator'";
		$qry = $this->db->query($sql);
		return $qry->result_array();        
	}
	  
	public function getUserById($idUser){
		$query = "SELECT * FROM tbluser WHERE idUser='$idUser'";     
		$sql = $this->db->query($query);
		return $sql->result_array();  
	}	  

    public function getSumuser(){
        $sql = "SELECT COUNT(idUser)AS id,
				(SELECT (COUNT(idUser)) FROM tbluser a WHERE jnsKel='l' and level!='Administrator' ) AS L,
				(SELECT (COUNT(idUser)) FROM tbluser a WHERE jnsKel='p' and level!='Administrator' ) AS P
			FROM tbluser where level!='Administrator'";
        $qry = $this->db->query($sql)->result_array();
        return $qry;        
	}
	
	public function updateLastLogin($user,$data,$tabel){ 
		$this->db->where('user', $user);
		$this->db->update($tabel, $data);
		return  "Data ".$id." Berhasil Diupdate";
	} 	

}