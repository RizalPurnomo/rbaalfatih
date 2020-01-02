<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabungan_model extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	public function saveData($data,$tabel){
		$this->db->insert($tabel, $data);   
	}  	

	public function editData($id,$data,$tabel){ 
		$this->db->where('idTabungan', $id);
		$this->db->update($tabel, $data);
		return  "Data ".$id." Berhasil Diupdate";
	} 	

	public function deleteData($id,$tabel){
		$this->db->where('idTabungan', $id);
		$this->db->delete($tabel);
	} 	

	public function getidTabungan($thn){
		$idTabungan="";
		$sql = "SELECT MAX(idTabungan) AS maxTabungan FROM tbltabungan WHERE idTabungan LIKE '$thn%'";
		$qry = $this->db->query($sql)->result_array();
		$maxTabungan = $qry[0]['maxTabungan'];
		//echo $maxRM;
		//exit;
		if (empty($maxTabungan)) {
			$idTabungan=$thn."001";
		}else{
			$maxTabungan++;
			$idTabungan = $maxTabungan;
		}
		return $idTabungan;      
	}	

	public function getAllTabungan(){
		$sql = "SELECT * FROM tbltabungan a
			INNER JOIN tblsantri b ON a.idsantri=b.idSantri
			INNER JOIN tbluser c ON c.iduser=a.iduser
			inner join tblkelas d on d.idkelas=b.idkelas
			order by tanggal desc";
		$qry = $this->db->query($sql);
		return $qry->result_array();        
	}
	  
	public function getTabunganById($idTabungan){
		$query = "SELECT * FROM tbltabungan a
			INNER JOIN tbluser b ON a.idUser=b.iduser
			INNER JOIN tblsantri c ON c.idSantri=a.idSantri
			WHERE a.idTabungan='$idTabungan'";     
		$sql = $this->db->query($query);
		return $sql->result_array();  
	}	  

    public function getSaldoTabungan(){
        $sql = "SELECT (SUM(debet)-SUM(kredit)) AS saldo FROM tbltabungan";
        $qry = $this->db->query($sql)->result_array();
        return $qry;        
	}	
	
    public function getDebetTabungan(){
        $sql = "SELECT (SUM(debet)) AS debet FROM tbltabungan";
        $qry = $this->db->query($sql)->result_array();
        return $qry;        
	}	
	
    public function getKreditTabungan(){
        $sql = "SELECT (SUM(kredit)) AS kredit FROM tbltabungan";
        $qry = $this->db->query($sql)->result_array();
        return $qry;        
    }		

}