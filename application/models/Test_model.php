<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_model extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	public function getUser(){
		$sql = "SELECT * FROM tbluser";
		$qry = $this->db->query($sql);
		return $qry->result_array();         
    }

}