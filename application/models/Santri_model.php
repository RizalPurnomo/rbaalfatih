<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	public function saveData($data,$tabel){
		$this->db->insert($tabel, $data);   
	}  	

	public function editData($id,$data,$tabel){ 
		$this->db->where('idSantri', $id);
		$this->db->update($tabel, $data);
		return  "Data ".$id." Berhasil Diupdate";
	} 	

	public function deleteData($id,$tabel){
		$this->db->where('idSantri', $id);
		$this->db->delete($tabel);
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
		$sql = "SELECT * FROM tblsantri a
			INNER JOIN tblkelas b ON a.idkelas=b.idkelas
			order by nama";
		$qry = $this->db->query($sql);
		return $qry->result_array();        
	}
	  
	public function getSantriById($idSantri){
		$query = "SELECT * FROM tblSantri WHERE idSantri='$idSantri'";     
		$sql = $this->db->query($query);
		return $sql->result_array();  
	}	  

    public function getSumSantri(){
        $sql = "SELECT COUNT(idsantri)AS id,
				(SELECT (COUNT(idsantri)) FROM tblsantri a WHERE jnsKel='l' ) AS L,
				(SELECT (COUNT(idsantri)) FROM tblsantri a WHERE jnsKel='p' ) AS P
			FROM tblsantri ";
        $qry = $this->db->query($sql)->result_array();
        return $qry;        
	}	
	
    public function search_santri($nama){
        $this->db->like('nama', $nama , 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tblsantri')->result();
    }    	

}