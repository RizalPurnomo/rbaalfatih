<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //chek_session();
    // if(!empty($this->session->userdata("username"))) {
    // 	redirect("home/dashboard");
    // 	die();
    // }else{
    //   redirect("home");
    // }   
    $this->load->model(array('santri_model', 'kelas_model', 'tabungan_model', 'pembayaran_model'));
  }

  public function index()
  {
    $data['pembayaran'] = $this->pembayaran_model->getAllPembayaran();
    //$data['kelas']      = $this->kelas_model->getAllKelas();

    $this->load->view('pembayaran/view_pembayaran', $data);
  }

  function add()
  {
    $data['idPembayaran']   = $this->pembayaran_model->getIdPembayaran(date('y'));
    $data['santri'] = $this->santri_model->getAllSantri();
    $this->load->view('pembayaran/view_pembayaran_add', $data);
  }

  public function getMaxPembayaran()
  {
    $idPembayaran = $this->pembayaran_model->getidPembayaran(date('y'));
    echo $idPembayaran;
  }


  public function savePembayaran()
  {
    $pembayaran = $this->input->post('pembayaran');
    $this->pembayaran_model->saveData($pembayaran, 'tblpembayaran');
    print_array($this->input->post());
  }

  function edit($idPembayaran)
  {
    if (isset($idPembayaran)) {
      $data['santri']       = $this->santri_model->getAllSantri();
      $data['pembayaran']     = $this->pembayaran_model->getPembayaranById($idPembayaran);
    }
    $this->load->view('pembayaran/view_pembayaran_edit', $data);
  }


  //--------------------------


  function delete($idTabungan)
  {
    if (isset($idTabungan)) {
      $this->tabungan_model->deleteData($idTabungan, "tbltabungan");
    }
    return "Data Berhasil Di Delete";
  }


  public function editTabungan($idTabungan)
  {
    $tabungan = $this->input->post('tabungan');
    $this->tabungan_model->editData($idTabungan, $tabungan, 'tbltabungan');
    print_array($this->input->post());
  }

  public function laporan()
  {
    $thn = '2020';
    $data['lapPerBulan'] = $this->tabungan_model->getLaporan($thn);
    $this->load->view('tabungan/view_lap_tabungan', $data);
  }

  public function lapPerSantri($idSantri)
  {
    $data['lapPerSantri'] = $this->tabungan_model->getLapPerSantri($idSantri);
    $this->load->view('tabungan/view_lap_per_santri', $data);
  }

  public function lapPerBulan($bln)
  {
    $thn    = '2020';
    $bulan  = "";
    if ($bln == '01') {
      $bulan = "Januari";
    } else if ($bln == '02') {
      $bulan = "Februari";
    } else if ($bln == '03') {
      $bulan = "Maret";
    } else if ($bln == '04') {
      $bulan = "April";
    } else if ($bln == '05') {
      $bulan = "Mei";
    } else if ($bln == '06') {
      $bulan = "Juni";
    } else if ($bln == '07') {
      $bulan = "Juli";
    } else if ($bln == '08') {
      $bulan = "Agustus";
    } else if ($bln == '09') {
      $bulan = "September";
    } else if ($bln == '10') {
      $bulan = "Oktober";
    } else if ($bln == '11') {
      $bulan = "November";
    } else if ($bln == '12') {
      $bulan = "Desember";
    }

    $data['bln'] = array('bln' => $bulan, 'thn' => $thn);
    $data['lapPerBulan'] = $this->tabungan_model->getLapPerBulan($bln, $thn);
    $this->load->view('tabungan/view_lap_per_bln', $data);
  }
}

// $ eval `ssh-agent -s`
// Agent pid 7588
