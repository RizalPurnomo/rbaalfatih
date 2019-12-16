<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	public function saveData($data,$tabel){
		$this->db->insert($tabel, $data);   
	}  	

	public function editData($id,$data,$tabel){ 
		$this->db->where('idKelas', $id);
		$this->db->update($tabel, $data);
		return  "Data ".$id." Berhasil Diupdate";
	} 	

	public function deleteData($id,$tabel){
		$this->db->where('idKelas', $id);
		$this->db->delete($tabel);
	} 	

	public function getidKelas($thn){
		$idKelas="";
		$sql = "SELECT MAX(idKelas) AS maxKelas FROM tblkelas WHERE idKelas LIKE '$thn%'";
		$qry = $this->db->query($sql)->result_array();
		$maxKelas = $qry[0]['maxKelas'];
		if (empty($maxKelas)) {
			$idKelas=$thn."001";
		}else{
			$maxKelas++;
			$idKelas = $maxKelas;
		}
		return $idKelas;      
	}	

	public function getAllKelas(){
		$sql = "SELECT * FROM tblkelas a
            INNER JOIN tbluser b ON a.iduser=b.iduser";
		$qry = $this->db->query($sql);
		return $qry->result_array();        
	}
	  
	public function getKelasById($idKelas){
		$query = "SELECT * FROM tblKelas a
            INNER JOIN tbluser b ON a.iduser=b.iduser
            WHERE idKelas='$idKelas'";     
		$sql = $this->db->query($query);
		return $sql->result_array();  
	}	  

    // public function getSumKelas(){
    //     $sql = "SELECT COUNT(idkelas)AS id,
	// 			(SELECT (COUNT(idkelas)) FROM tblsantri a WHERE jnsKel='l' ) AS L,
	// 			(SELECT (COUNT(idkelas)) FROM tblsantri a WHERE jnsKel='p' ) AS P
	// 		FROM tblsantri ";
    //     $qry = $this->db->query($sql)->result_array();
    //     return $qry;        
    // }	

}