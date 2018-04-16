<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_profile extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('update_profile_mod');

	}
	public function index()
	{  
     
      $data['pro']=$this->update_profile_mod->update_pro();
	  $this->load->view('accounts/view_profile',$data);
	}

}
?>