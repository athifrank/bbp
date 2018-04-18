<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zonal_wishlist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Zonal_wishlist_mod');

	}
	public function index()
	{
      $data['wishlist']=$this->Zonal_wishlist_mod->get_pro($_SESSION['id']);  
     $this->load->view('zonal_wish',$data); 
	}
	
	public function add()
	{
      $i=$this->input->post('id');
	  $col=$this->input->post('col');
	  $user=$this->input->post('user');
      $this->Zonal_wishlist_mod->add_list($i,$col,$user);
	}
	
	public function del()
	{
      $i=$this->input->post('id');
	  $user=$this->input->post('user');
      $this->Zonal_wishlist_mod->del_list($i,$user);
	}
	
	

}
?>