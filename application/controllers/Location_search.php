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
		
		$page=$this->input->post('custom');
		
		$ptype=$this->input->post('ptype');
		$loc=$this->input->post('loc');
		$br=$this->input->post('br');
		
		
		if($page){
			
			//custom location search area
			
			 if (empty($search_top) && empty($search_area)){
				$this->session->set_flashdata('field','<script>alert("please choose some field");</script>');
				redirect("Custom_search/index/$ptype/$loc/$br");

		  }else{
			  $data['z1']=$ptype;
			  $data['z2']=$loc;
			  $data['z3']=$br;
			  
			  $data['showproperties']=$this->zonal_search_mod->zonal_search($id);
			  $data['location_search']=$this->zonal_search_mod->location_search();
			  $data['show_location']=$this->location_search_mod->custom_search($search_top,$search_area,$ptype,$loc,$br);
			  
			   if(isset($_SESSION['id'])){
				  $data['wishlist']=$this->Zonal_wishlist_mod->get_pro($_SESSION['id']); 
				  }else{
					 $data['wishlist']=$this->Zonal_wishlist_mod->get_pro('0');  
				  }
			  $this->load->view('custom_location_search',$data); 

				}
			
			
		}else
		{
			//zonal location search area 
			
		  if (empty($search_top) && empty($search_area)){
				redirect("zonal_search/index/$id");

		  }else{
			  $data['zone_id']=$id;
			  $data['showproperties']=$this->zonal_search_mod->zonal_search($id);
			  $data['location_search']=$this->zonal_search_mod->location_search();
			  $data['show_location']=$this->location_search_mod->search($search_top,$search_area);
			  
			   if(isset($_SESSION['id'])){
				  $data['wishlist']=$this->Zonal_wishlist_mod->get_pro($_SESSION['id']); 
				  }else{
					 $data['wishlist']=$this->Zonal_wishlist_mod->get_pro('0');  
				  }
			  $this->load->view('location_search',$data); 

				}
		}
	  
	}


}
?>