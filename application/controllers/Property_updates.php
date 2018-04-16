<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_updates extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Property_updates_mod');

	}
	public function index()
	{
	$data['pro_up']=$this->Property_updates_mod->pro_up();
 	$this->load->view('property_updates',$data);
	}

}
?>