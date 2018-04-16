<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_properties extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('manage_properties_mod');

	}
	public function index()
	{  

      $data['no']=$this->manage_properties_mod->get_loc();
	  $this->load->view('accounts/manage_properties',$data);
	}

}
?>