<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_image extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('add_image_mod');

	}
	public function index()
	{  
	         	//$id=$row['id'];
				//$tit = $row['tit'];
	
      $data['row']=$this->add_image_mod->get_loc();
	  $this->load->view('accounts/add_image',$data);
	}

}
?>