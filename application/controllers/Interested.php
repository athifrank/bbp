<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interested extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
         $this->load->model('Custom_search_mod');
		$this->load->model('slider1_mod');
	}
	public function index()
	{ 

	$i=$this->input->post('i');
	$id=$this->input->post('id');
	
	$name=$this->input->post('name');
	$mobi=$this->input->post('mobi');
	$mail=$this->input->post('eid');
		
	if(empty($mail)) $mail='Not provided';
	if(empty($mobi)) $mobi='Not provided';
	if(empty($name)) $name='Not provided';
	
	$query=$this->db->query("SELECT * from users u,properties p WHERE u.id= p.uid and p.id=$id");
	$ro = $query->result_array();
	foreach($ro as $row){
	$tit=$row['tit'];
	$eid=$row['eid'];
	$ename=$row['name'];
	$pid=$row['id'];
	}
	
	#mail 
	$from = $mail;
	$to    = $eid;

	$subject  = 'Bangalore Best Property';			
	$message  = '<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title></head>
	<body><div>
	<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
	<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/><br /><br>
	Dear '.$ename.',
	<p>'.$name.' is interested to buy/rent your property - '.$tit.'.( Property Id : '.$pid.')<br /><br />
	You can contact him with the provided information below<br /><br />
	Name: '.$name.'<br />
	Mobile: '.$mobi.'<br />
	Email: '.$from.'
	</p>																				
	Regards ,<br />
	Bangalorebestproperty.</div>
	</body>
	</html>';
	 $this->email->set_newline("\r\n");
					   $this->email->set_mailtype("html");
					  $this->email->from($mail); // change it to yours
					  $this->email->to($eid );// change it to yours
					  $this->email->subject($subject);
					  $this->email->message($message);
					  $send=$this->email->send();	
	if($send){
		$this->session->set_flashdata('we','*We have communicated your message to the property owner');
	redirect("slide_property/index/$i");
		//header("Location: $page?i=$i&a=2i9");
	}
	else{
		$this->session->set_flashdata('server','* Server error try again later');
	redirect("slide_property/index/$i");
		//header("Location: $page?i=$i&a=2i8");
	}
	}
	
	
	public function custom()
	{ 

	$i=$this->input->post('i');
	$id=$this->input->post('id');
	
	$name=$this->input->post('name');
	$mobi=$this->input->post('mobi');
	$mail=$this->input->post('eid');
		
	if(empty($mail)) $mail='Not provided';
	if(empty($mobi)) $mobi='Not provided';
	if(empty($name)) $name='Not provided';
	
	$query=$this->db->query("SELECT * from users u,properties p WHERE u.id= p.uid and p.id=$id");
	$ro = $query->result_array();
	foreach($ro as $row){
	$tit=$row['tit'];
	$eid=$row['eid'];
	$ename=$row['name'];
	$pid=$row['id'];
	}
	
	#mail 
	$from = $mail;
	$to    = $eid;

	$subject  = 'Bangalore Best Property';			
	$message  = '<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title></head>
	<body><div>
	<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
	<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/><br /><br>
	Dear '.$ename.',
	<p>'.$name.' is interested to buy/rent your property - '.$tit.'.( Property Id : '.$pid.')<br /><br />
	You can contact him with the provided information below<br /><br />
	Name: '.$name.'<br />
	Mobile: '.$mobi.'<br />
	Email: '.$from.'
	</p>																				
	Regards ,<br />
	Bangalorebestproperty.</div>
	</body>
	</html>';
	 $this->email->set_newline("\r\n");
					   $this->email->set_mailtype("html");
					  $this->email->from($mail); // change it to yours
					  $this->email->to($eid );// change it to yours
					  $this->email->subject($subject);
					  $this->email->message($message);
					  $send=$this->email->send();	
	if($send){
		  $data['z1']=$this->input->post('ptype');
      $data['z2']=$this->input->post('location');
	  $data['z3']=$this->input->post('type');
      $data['showproperties']=$this->Custom_search_mod->cus_search();
      //print_r($data); 	  
	  $data['price_min']=$this->slider1_mod->price_min();
	  $data['price_max']= $this->slider1_mod->price_max();
	  $data['area_min']= $this->slider1_mod->area_min();
	  $data['area_max']= $this->slider1_mod->area_max();
	  $data['bhk_min']= $this->slider1_mod->bhk_min();
	  $data['bhk_max']= $this->slider1_mod->bhk_max();
		$this->session->set_flashdata('we','*We have communicated your message to the property owner');
     $this->load->view('custom_search',$data); 
	//redirect("custom_search/index/$i");
		//header("Location: $page?i=$i&a=2i9");
	}
	else{
		  $data['z1']=$this->input->post('ptype');
      $data['z2']=$this->input->post('location');
	  $data['z3']=$this->input->post('type');
      $data['showproperties']=$this->Custom_search_mod->cus_search();
//print_r($data1); 	  
	  $data['price_min']=$this->slider1_mod->price_min();
	  $data['price_max']= $this->slider1_mod->price_max();
	  $data['area_min']= $this->slider1_mod->area_min();
	  $data['area_max']= $this->slider1_mod->area_max();
	  $data['bhk_min']= $this->slider1_mod->bhk_min();
	  $data['bhk_max']= $this->slider1_mod->bhk_max();
		$this->session->set_flashdata('server','* Server error try again later');
     $this->load->view('custom_search',$data); 
	//redirect("custom_search/index/$i");
		//header("Location: $page?i=$i&a=2i8");
	}
	}
}