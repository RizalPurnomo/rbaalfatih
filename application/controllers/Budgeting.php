<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Budgeting extends CI_Controller {

	public function __construct(){
    parent::__construct();
    //chek_session();
		// if(!empty($this->session->userdata("username"))) {
		// 	redirect("home/dashboard");
		// 	die();
		// }else{
    //   redirect("home");
    // }   
		$this->load->model(array('santri_model','kelas_model','tabungan_model'));
  }

    public function index(){
      // $this->load->view('budgeting/view_budgeting');
      
      require_once realpath(__DIR__ . DIRECTORY_SEPARATOR . '../../vendor/autoload.php'); 

      $html = "<h1>1</h1>";  
      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'orientation' => 'L'
      ]);
    
      $mpdf->WriteHTML($html);
      $mpdf->Output("Halo.pdf","D");

      $html = "<h1>2</h1>";  
      $mpdf2 = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'orientation' => 'L'
      ]);
    
      $mpdf2->WriteHTML($html);
      $mpdf2->Output("Halo2.pdf","D");

    }
    
    
}
