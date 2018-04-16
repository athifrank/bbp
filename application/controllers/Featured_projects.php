<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Featured_projects extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
       $this->load->model('featured_projects_mod');

	}
	public function index()
	{  
      $data['ro']=$this->featured_projects_mod->get_pos();
	  $data['query']=$this->featured_projects_mod->get_fea();
	  $this->load->view('accounts/featured_projects',$data);
	}
	
	
	 public function add_projects(){
		 $this->load->view('accounts/add_projects');
	 }
	 
	 public function add_action(){
		 
     $date=date('d-m-Y');
	$tit=$this->input->post('tit');
	$loc=$this->input->post('loc');
	$ptype=$this->input->post('ptype');
	$text=$this->input->post('text');
	
	if( !empty($tit) || !empty($loc) || !empty($ptype) || !empty($text))
	{
		$tit = ucwords(strtolower($tit));
		$query=$this->db->query("SELECT max(pos)+1 p FROM fp;");
		$ro=$query->result_array();
		foreach($ro as $row){
		$pos=$row['p'];
		}
	$query=$this->db->query("INSERT INTO fp(`pos`,`tit`,`loc`,`ptype`,`banner`,`thumbs`,`text`,`date`)VALUES('$pos','$tit','$loc','$ptype','no.jpg','no.jpg','$text','$date');");
	
	 $this->session->set_flashdata('one','* One new Project added to the list');
	 redirect("manage_projects");
	 //echo 'success';
		//header ("Location: ../manage_projects.php?a=ki9");
	}
	else {
		
	 $this->session->set_flashdata('server','* Server busy please try later');
	 redirect("add_projects");
		//header ("Location: ../add_projects.php?a=qne");
	}
	 }
	 
	 public function update_position(){
		 
	 $pid=$this->input->get('pid');
	 $pos=$this->input->get('pos');
	
	if(empty($pid) || empty($pos)){
     $this->session->set_flashdata('select','* Select both position and project to update');
	 redirect("featured_projects");
	//header ("Location: ../featured_projects.php?a=kii");
	}
	else
	{
		
		$query=$this->db->query("SELECT pos from fp where pid=$pid");
		$ro =$query->result_array();
		foreach($ro as $row){
		$pos1=$row['pos'];
		}
		$query=$this->db->query("SELECT pid from fp where pos=$pos");
		$ro =$query->result_array();
		foreach($ro as $row){
		$pid1=$row['pid'];
		}
				
		$query=$this->db->query("UPDATE fp SET pos='$pos' where pid=$pid;");
		$query=$this->db->query("UPDATE fp SET pos='$pos1' where pid=$pid1");
		
		if($query){
			 $this->session->set_flashdata('pos','* Position-'.$pos.' and Position-'.$pos1.' are updated');
	 redirect("featured_projects");
		//header ("Location: ../featured_projects.php?a=ki9&b=$pos&c=$pos1");
		}
		else{
			 $this->session->set_flashdata('server','server busy try again later');
	 redirect("featured_projects");
		//header ("Location: ../featured_projects.php?a=qne");
		}
	} 
	 }
  	

	
}
?>