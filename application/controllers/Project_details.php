<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_details extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('project_details_mod');

	}
	public function index()
	{
     $id=$this->uri->segment(3);
     $data['show_project']=$this->project_details_mod->show_project( $id);
     $data['show_project2']=$this->project_details_mod->show_project2( $id);  	  
     $this->load->view('project_details',$data); 
	}
	



}
?>