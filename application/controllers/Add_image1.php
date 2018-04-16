<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_image1 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('add_image_mod');

	}
	public function index()
	{  
	         	//$id=$row['id'];
				//$tit = $row['tit'];
	
      $data['row']=$this->add_image_mod->admin_add_img();
	  $this->load->view('accounts/add_image1',$data);
	}

}
?>