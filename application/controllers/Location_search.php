<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_search extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('zonal_search_mod');
		$this->load->model('location_search_mod');
		$this->load->model('Zonal_wishlist_mod');

	}
	public function index()
	{
		$id=$this->uri->segment(3);
		$search_top=$this->input->post('search_top');
		$search_area=$this->input->post('search_area');
	  //$data['location_search']=$this->zonal_search_mod->location_search( );
	  if (empty($search_top) && empty($search_area)){
      //$data['show_location']=$this->location_search_mod->search();
	      //$this->session->set_flashdata('loc','Please select the location');
		  //$data['showproperties']=$this->zonal_search_mod->zonal_search($id);
	      //$data['location_search']=$this->zonal_search_mod->location_search();
	      //$this->load->view('location_search',$data); 
			//echo "em";
			redirect("zonal_search/index/$id");

	  }else{
		  $data['zone_id']=$id;
		  $data['showproperties']=$this->zonal_search_mod->zonal_search($id);
		  $data['location_search']=$this->zonal_search_mod->location_search();
		  $data['show_location']=$this->location_search_mod->search();
		  
		   if(isset($_SESSION['id'])){
			  $data['wishlist']=$this->Zonal_wishlist_mod->get_pro($_SESSION['id']); 
			  }else{
				 $data['wishlist']=$this->Zonal_wishlist_mod->get_pro('0');  
			  }
		  $this->load->view('location_search',$data); 

	  }
	  
	  //print_r($data);
	}


}
?>