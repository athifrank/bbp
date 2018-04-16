<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_properties extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('users_properties_mod');

	}
	public function index()
	{  

      $data['no']=$this->users_properties_mod->get_user_pro();
	  $this->load->view('accounts/users_properties',$data);
	}

}
?>