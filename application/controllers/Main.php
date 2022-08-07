<?php
class Main extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('model_status');
    }

    function index(){
        $this->load->view('view_main');
    }
    
    function post_status(){
        $this->model_status->simpan_status();
    }
    
    function hapus_status(){
        $id=$_GET['IdGuru'];
        $this->model_status->delete($id);
    }

    function edit_status(){
        $id     = $_GET['IdGuru'];
        $data   = $this->model_status->getStatus($id);

    }
    
    function load_status(){
        $data=$this->model_status->tampilkan_status();
        foreach ($data->result() as $r){
            echo "<div class='statusku$r->IdGuru'>";
            echo $r->IdGuru."<br>";
            echo $r->UserName."<br>";
            echo $r->RealName.'<br>';
            echo $r->Pass.'<br>';
            echo $r->Lev.'<br>';
            echo $r->Status.'<br>';
            echo "<input type='text' id='keyword' placeholder='Kata Kunci'><br>";
            echo "<a onclick='edit($r->IdGuru)'>Edit</a> || <a onclick='hapus($r->IdGuru)'>Hapus</a><hr></div>";
        }
    }
      
    function search_status(){
        $keyword=$_GET['keyword'];
        $field  =$_GET['field'];
        $data=$this->model_status->cari_status($keyword,$field);
        foreach ($data->result() as $r){
            echo $r->IdGuru."<br>";
            echo $r->UserName."<br>";
            echo $r->RealName.'<br>';
            echo $r->Pass.'<br>';
            echo $r->Lev.'<br>';
            echo $r->Status.'<br><hr>';
        }
    }
}