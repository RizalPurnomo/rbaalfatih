<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('print_array')){
	function print_array($data){
		echo "<pre>"; print_r($data); echo "</pre>";
	}	
}

function chek_session(){
    $CI= & get_instance();
    $session=$CI->session->userdata('username');
    if($session==""){
        redirect('home');
    }
    if(!$CI->session->userdata()){
        redirect('home');   
    }
}


function hitung($kkm,$score,$remedial){
    $input='';
    if ($score >= $kkm) {
        $input = $score;
    }else{
        if ($remedial >= $kkm) {
            $input = $kkm;
        }else{
            if ($score >= $remedial) {
                $input = $score;
            }else{
                $input = $remedial;
            }
        }
    }
    return $input;
}

function hitungTotExHw($nilai1,$nilai2,$nilai3,$nilai4,$nilai5){
    $total= $nilai1 + $nilai2 + $nilai3 + $nilai4 + $nilai5;
    return $total;
}

function hitungAveExHw($nilai1,$nilai2,$nilai3,$nilai4,$nilai5,$total){
    $pembagi = 0;
    if ($nilai1!="") {
        $pembagi++;
    }
    if ($nilai2!="") {
        $pembagi++;
    }
    if ($nilai3!="") {
        $pembagi++;
    }
    if ($nilai4!="") {
        $pembagi++;
    }
    if ($nilai5!="") {
        $pembagi++;
    }
    if ($pembagi==0) {
        return $ave=0;
    }else{
        $ave=$total/$pembagi;
        return $ave;        
    }
}

function getThnAjaran($thnAjaran){
    $thn = explode("/",$thnAjaran);
    $thn1 = $thn[1];
    $thn2 = $thn[1]+1;
    $thnAjaran = array();
    $x = 2015;
    while($x <= $thn1) {
      array_push($thnAjaran, $thn1 . "/" . $thn2 );
      $thn1--;
      $thn2--;
    } 
    return $thnAjaran;
}

