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
	
	public function getLaporan($thn){
		$sql = "SELECT DISTINCT(a.idSantri),a.nama,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='01' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='01' AND YEAR(tanggal)='$thn') AS Jan,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='02' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='02' AND YEAR(tanggal)='$thn') AS Feb,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='03' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='03' AND YEAR(tanggal)='$thn') AS Mar,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='04' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='04' AND YEAR(tanggal)='$thn') AS Apr,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='05' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='05' AND YEAR(tanggal)='$thn') AS Mei,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='06' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='06' AND YEAR(tanggal)='$thn') AS Jun,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='07' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='07' AND YEAR(tanggal)='$thn') AS Jul,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='08' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='08' AND YEAR(tanggal)='$thn') AS Aug,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='09' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='09' AND YEAR(tanggal)='$thn') AS Sep,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='10' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='10' AND YEAR(tanggal)='$thn') AS Okt,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='11' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='11' AND YEAR(tanggal)='$thn') AS Nov,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='12' AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND MONTH(tanggal)='12' AND YEAR(tanggal)='$thn') AS Des,
					(SELECT SUM(debet) FROM tbltabungan WHERE idsantri=a.idsantri AND YEAR(tanggal)='$thn') - (SELECT SUM(kredit) FROM tbltabungan WHERE idsantri=a.idsantri AND YEAR(tanggal)='$thn') AS Total
				FROM tblsantri a
				LEFT JOIN tbltabungan b ON a.idSantri=b.idSantri";
		$qry = $this->db->query($sql)->result_array();
		return $qry;
	}

	public function getLapPerSantri($idSantri){
		$sql = "SELECT * FROM tbltabungan a
				INNER JOIN tblsantri b ON a.idsantri=b.idsantri
				WHERE a.idsantri='$idSantri'
				ORDER BY a.tanggal ASC";
		$qry = $this->db->query($sql)->result_array();
		return $qry;
	}	

	public function getLapPerBulan($bln,$thn){
		$sql = "SELECT * FROM tbltabungan a
				INNER JOIN tblsantri b ON a.idsantri=b.idsantri
				WHERE MONTH(tanggal)='$bln' AND YEAR(tanggal)='$thn'";
		$qry = $this->db->query($sql)->result_array();
		return $qry;
	}	

}