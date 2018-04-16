<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_properties extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('admin_properties_mod');

	}
	public function index()
	{  

      $data['no']=$this->admin_properties_mod->get_loc();
	  $this->load->view('accounts/admin_properties',$data);
	}

}
?>