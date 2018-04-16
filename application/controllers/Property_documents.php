<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_documents extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('property_documents_mod');

	}
	public function index()
	{  

      $data['query']=$this->property_documents_mod->pro_doc();
	  $this->load->view('property_documents',$data);
	}

}
?>