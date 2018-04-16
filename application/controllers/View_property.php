<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_property extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('view_property_mod');

	}
	public function index()
	{  
      $id = $this->uri->segment(3);
	   $data['id']=$id;
      $data['result']=$this->view_property_mod->view_pro($id);
	  $this->load->view('accounts/view_property',$data);
	}
	
		public function admin()
	{  
      $id = $this->uri->segment(3);
	   $data['id']=$id;
      $data['result']=$this->view_property_mod->admin_pro($id);
	  $this->load->view('accounts/view_property_admin',$data);
	}

}
?>