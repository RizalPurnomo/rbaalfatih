<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct(){
		parent::__construct();
    }

	public function getValidUser($username,$password){
		$sql = "SELECT * FROM tbluser 
 				where user='".$username."' and password='".$password."'";
		$qry = $this->db->query($sql);
		return $qry->result_array();
	}
}