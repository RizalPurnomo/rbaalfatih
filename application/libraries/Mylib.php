<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mylib {

    function chek_session(){
        $CI= & get_instance();
        $session=$CI->session->userdata('username');
        if($session==""){
        	echo "kosong";
            redirect('index.php/home');
        }else{
        	echo "isi";
        	redirect('index.php/dashboard');
        }
    }

    function is_logged_in(){
    	$_this =& get_instance();
    	$session= $_this->session->userdata();
    	if (isset($user_session['username'])) {
    		redirect('index.php/dashboard');
    	}else{
    		$_this->session->sess_destroy();
    		redirect('index.php/home');
    	}
    }
}