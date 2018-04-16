<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare_properties extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('compare_properties_mod');

	}
	public function index()
	{

      $data['com_pro']=$this->compare_properties_mod->com_pro(); 	  

     $this->load->view('compare_properties',$data); 
	}
	
	

}
?>