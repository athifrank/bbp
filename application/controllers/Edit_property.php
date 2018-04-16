<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_property extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('edit_property_mod');

	}
	public function index()
	{  
      $id = $this->uri->segment(3);
	   $data['id']=$id;
	    $data['loc_list']=$this->edit_property_mod->loc_list();
      $data['result']=$this->edit_property_mod->edit_pro($id);
	  $this->load->view('accounts/edit_property',$data);
	}
	
	public function edit(){
		
	$id=$this->uri->segment(3);	
	$tit=str_replace("\'", "&#39;", $this->input->post('tit'));
	$loc=$this->input->post('loc');
	$lmark=str_replace("\'", "&#39;", $this->input->post('lmark'));
	$zone=$this->input->post('zone');
	$area=$this->input->post('area');
	$price=$this->input->post('price');
	$aa=$this->input->post('aa');
	$ptype=$this->input->post('ptype');
	$pfrom=$this->input->post('pfrom');
	$bank=$this->input->post('bank');
	$nc=str_replace("\'", "&#39;", $this->input->post('nc'));
	$br=$this->input->post('br');
	$bhk=$this->input->post('bhk');
	
	$room=$this->input->post('room');
	$broom=$this->input->post('broom');
	$hall=$this->input->post('hall');
	$troom=$this->input->post('troom');
	$park=$this->input->post('park');
	$floor=$this->input->post('floor');
	$amen=str_replace("\'", "&#39;", $this->input->post('amen'));
	$rmark=str_replace("\'", "&#39;", $this->input->post('rmark'));
	$face=$this->input->post('face');
	$leven=$this->input->post('leven');
	$twel=$this->input->post('twel');
	
	$uid = $_SESSION['id'];
    $date=date('d-m-Y');
	
		if(empty($room))$room='0'; if(empty($broom))$broom='0'; if(empty($hall))$hall='0';if(empty($troom))$troom='0'; if(empty($floor))$floor='0';
	if(empty($park))$park='Not updated'; if(empty($amen))$amen='Not updated'; if(empty($rmark))$rmark='Not updated'; 
	if(empty($l1))$l1='Not updated'; if(empty($l2))$l2='Not updated'; if(empty($face))$face='Not updated'; 
	if($ptype == 'Land' || $ptype == 'Commercial Property')$bhk=0;
	
	if (empty($tit) || empty($loc) || empty($lmark) || empty($zone) || empty($area)|| empty($price) || empty($aa) || empty($ptype) || empty($pfrom) || empty($bank) || empty($nc) || empty($br))
	{
	$this->session->set_flashdata('field','*Please fill all the required fields');
	redirect("edit_property/index/$id");
	//redirect('edit_property');
	}
		$tit=ucwords(strtolower($tit));
		$lmark=ucwords(strtolower($lmark));
		$nc=ucwords(strtolower($nc));
		$face=ucwords(strtolower($face));
		$amen=ucwords(strtolower($amen));
		$rmark=ucwords(strtolower($rmark));
		
			$query=$this->db->query("UPDATE properties SET tit='$tit',loc='$loc',lmark='$lmark',zone='$zone',area='$area',price='$price'
		,aa='$aa',ptype='$ptype',pfrom='$pfrom',bank='$bank',nc='$nc',br='$br',room='$room',broom='$broom'
		,hall='$hall',troom='$troom',park='$park',floor='$floor',amen='$amen',rmark='$rmark',l1='$leven',l2='$twel',bhk='$bhk',face='$face' WHERE id=$id");					
		$this->session->set_flashdata('success','*Property Updated sucessfully');
		//redirect('edit_property');
		$this->index();
		
	}
	
	public function admin_edit()
	{  
      $id = $this->uri->segment(3);
	   $data['id']=$id;
	    $data['loc_list']=$this->edit_property_mod->loc_list();
      $data['result']=$this->edit_property_mod->edit_pro($id);
	  //print_r($data);
	  $this->load->view('accounts/edit_property_admin',$data);
	}
	
	public function admin_edit_pro(){
		
	 $id=$this->uri->segment(3);	
	 $tit=str_replace("\'", "&#39;", $this->input->post('tit'));
	 $loc=$this->input->post('loc');
	$lmark=str_replace("\'", "&#39;", $this->input->post('lmark'));
	$zone=$this->input->post('zone');
	$area=$this->input->post('area');
	$price=$this->input->post('price');
	$aa=$this->input->post('aa');
	$ptype=$this->input->post('ptype');
	$pfrom=$this->input->post('pfrom');
	$bank=$this->input->post('bank');
	$nc=str_replace("\'", "&#39;", $this->input->post('nc'));
	$br=$this->input->post('br');
	$bhk=$this->input->post('bhk');
	
	$room=$this->input->post('room');
	$broom=$this->input->post('broom');
	$hall=$this->input->post('hall');
	$troom=$this->input->post('troom');
	$park=$this->input->post('park');
	$floor=$this->input->post('floor');
	$amen=str_replace("\'", "&#39;", $this->input->post('amen'));
	$rmark=str_replace("\'", "&#39;", $this->input->post('rmark'));
	$face=$this->input->post('face');
	$leven=$this->input->post('leven');
	$twel=$this->input->post('twel');
	
	//$uid = $_SESSION['id'];
    $date=date('d-m-Y');
	
		if(empty($room))$room='0'; if(empty($broom))$broom='0'; if(empty($hall))$hall='0';if(empty($troom))$troom='0'; if(empty($floor))$floor='0';
	if(empty($park))$park='Not updated'; if(empty($amen))$amen='Not updated'; if(empty($rmark))$rmark='Not updated'; 
	if(empty($l1))$l1='Not updated'; if(empty($l2))$l2='Not updated'; if(empty($face))$face='Not updated'; 
	if($ptype == 'Land' || $ptype == 'Commercial Property')$bhk=0;
	
	if (empty($tit) || empty($loc) || empty($lmark) || empty($zone) || empty($area)|| empty($price) || empty($aa) || empty($ptype) || empty($pfrom) || empty($bank) || empty($nc) || empty($br))
	{
	$this->session->set_flashdata('field','*Please fill all the required fields');
	redirect("edit_property/admin_edit/$id");
	//redirect('edit_property');
	
	}
		$tit=ucwords(strtolower($tit));
		$lmark=ucwords(strtolower($lmark));
		$nc=ucwords(strtolower($nc));
		$face=ucwords(strtolower($face));
		$amen=ucwords(strtolower($amen));
		$rmark=ucwords(strtolower($rmark));
		
			$query=$this->db->query("UPDATE properties SET tit='$tit',loc='$loc',lmark='$lmark',zone='$zone',area='$area',price='$price'
		,aa='$aa',ptype='$ptype',pfrom='$pfrom',bank='$bank',nc='$nc',br='$br',room='$room',broom='$broom'
		,hall='$hall',troom='$troom',park='$park',floor='$floor',amen='$amen',rmark='$rmark',l1='$leven',l2='$twel',bhk='$bhk',face='$face' WHERE id=$id");					
		$this->session->set_flashdata('success','*Property Updated sucessfully');
		//redirect('edit_property/admin_edit');
		$this->admin_edit();
		
	}

}
