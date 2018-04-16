<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggest_location extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('suggest_location_mod');
	}
	public function index()
	{
	$val=$this->input->get('term');
	$result=$this->suggest_location_mod->location($val);
    foreach($result as $row)
	{
		$data[] = $row['name'];
	}
   echo json_encode($data);
   flush();
	}
}
