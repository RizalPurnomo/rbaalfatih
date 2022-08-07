<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPembayaran()
    {
        $sql = "SELECT * FROM tblpembayaran a
        INNER JOIN tblsantri b ON b.idSantri=a.idSantri
        INNER JOIN tblkelas c ON c.idKelas=b.idKelas
        INNER JOIN tbluser d ON d.iduser=a.createdBy";
        $qry = $this->db->query($sql);
        return $qry->result_array();
    }

    public function getIdPembayaran($thn)
    {
        $idPembayaran = "";
        $sql = "SELECT MAX(idPembayaran) AS maxPembayaran FROM tblpembayaran WHERE idPembayaran LIKE '$thn%'";
        $qry = $this->db->query($sql)->result_array();
        $maxPembayaran = $qry[0]['maxPembayaran'];
        //echo $maxRM;
        //exit;
        if (empty($maxPembayaran)) {
            $idPembayaran = $thn . "001";
        } else {
            $maxPembayaran++;
            $idPembayaran = $maxPembayaran;
        }
        return $idPembayaran;
    }

    public function saveData($data, $tabel)
    {
        $this->db->insert($tabel, $data);
    }

    public function getPembayaranById($idPembayaran)
    {
        $query = "SELECT * FROM tblpembayaran a
            INNER JOIN tblsantri b ON b.idSantri=a.idSantri
            INNER JOIN tblkelas c ON c.idKelas=b.idKelas
            INNER JOIN tbluser d ON d.iduser=a.createdBy
            WHERE idPembayaran='$idPembayaran'";
        $sql = $this->db->query($query);
        return $sql->result_array();
    }



    //------------------------
    public function editData($id, $data, $tabel)
    {
        $this->db->where('idTabungan', $id);
        $this->db->update($tabel, $data);
        return  "Data " . $id . " Berhasil Diupdate";
    }

    public function deleteData($id, $tabel)
    {
        $this->db->where('idTabungan', $id);
        $this->db->delete($tabel);
    }


    public function getSaldoTabungan()
    {
        $sql = "SELECT (SUM(debet)-SUM(kredit)) AS saldo FROM tbltabungan";
        $qry = $this->db->query($sql)->result_array();
        return $qry;
    }

    public function getDebetTabungan()
    {
        $sql = "SELECT (SUM(debet)) AS debet FROM tbltabungan";
        $qry = $this->db->query($sql)->result_array();
        return $qry;
    }

    public function getKreditTabungan()
    {
        $sql = "SELECT (SUM(kredit)) AS kredit FROM tbltabungan";
        $qry = $this->db->query($sql)->result_array();
        return $qry;
    }

    public function getLaporan($thn)
    {
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

    public function getLapPerSantri($idSantri)
    {
        $sql = "SELECT * FROM tbltabungan a
				INNER JOIN tblsantri b ON a.idsantri=b.idsantri
				WHERE a.idsantri='$idSantri'
				ORDER BY a.tanggal ASC";
        $qry = $this->db->query($sql)->result_array();
        return $qry;
    }

    public function getLapPerBulan($bln, $thn)
    {
        $sql = "SELECT * FROM tbltabungan a
				INNER JOIN tblsantri b ON a.idsantri=b.idsantri
				WHERE MONTH(tanggal)='$bln' AND YEAR(tanggal)='$thn'";
        $qry = $this->db->query($sql)->result_array();
        return $qry;
    }
}
