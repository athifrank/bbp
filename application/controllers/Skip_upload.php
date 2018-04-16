<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skip_upload extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('add_image_mod');

	}
	public function index()
	{  
     $pid=$this->uri->segment(3);
	 	 $sql=$this->db->query("SELECT fname FROM image WHERE image.pid='$pid'");
	 $ro=$sql->result_array();
	 foreach($ro as $row){
		   $fname=$row['fname'];
	 }
	  if(empty($fname)){
	$query=$this->db->query("INSERT INTO image(`pid`,`fname`)VALUES('$pid','no.jpg')");	
	$query_email=$this->db->query("SELECT uid FROM properties where id='$pid';");
	   
	   $ro =$query_email->result_array();
       foreach($ro as $row){
	   $eid1=$row['uid'];
	   }	   
	   $query_email1=$this->db->query("SELECT * FROM users where id='$eid1';");
	   $ro1 =$query_email1->result_array();
	   foreach($ro1 as $row1){
	   $eid=$row1['eid'];
	   $ename=$row1['name'];
	   }
	   $to    = $eid;
	   $subject  = 'Bangalore Best Property';
	   $from="contact@bangalorebestproperty.com";
    $message  = '<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title></head>
	<body><div>
	<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
	<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/><br /><br>
	Dear '.$ename.',
	<p>Thanks for Listing your property in Bengalore Best Property.<br /><br />
	You can view the property details at '.site_url().'view_property/index/'.$pid.' <br /><br />
	For any informations/clarifications contact us at contact@bangalorebestproperty.com <br /><br />
	</p>																				
	Regards ,<br />
	Bangalorebestproperty.</div>
	</body>
	</html>';	  
    $this->email->set_newline("\r\n");
					   $this->email->set_mailtype("html");
					  $this->email->from($from); // change it to yours
					  $this->email->to($to );// change it to yours
					  $this->email->subject($subject);
					  $this->email->message($message);
					  $this->email->send();
	$this->session->set_flashdata('new','* One New Property added');
	redirect('manage_properties');
	  }
	  else{
		  	$query_email=$this->db->query("SELECT uid FROM properties where id='$pid';");
	   
	   $ro =$query_email->result_array();
       foreach($ro as $row){
	   $eid1=$row['uid'];
	   }	   
	   $query_email1=$this->db->query("SELECT * FROM users where id='$eid1';");
	   $ro1 =$query_email1->result_array();
	   foreach($ro1 as $row1){
	   $eid=$row1['eid'];
	   $ename=$row1['name'];
	   }
	   $to    = $eid;
	   $subject  = 'Bangalore Best Property';
	   $from="contact@bangalorebestproperty.com";
    $message  = '<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title></head>
	<body><div>
	<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
	<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/><br /><br>
	Dear '.$ename.',
	<p>Thanks for Listing your property in Bengalore Best Property.<br /><br />
	You can view the property details at '.site_url().'view_property/index/'.$pid.' <br /><br />
	For any informations/clarifications contact us at contact@bangalorebestproperty.com <br /><br />
	</p>																				
	Regards ,<br />
	Bangalorebestproperty.</div>
	</body>
	</html>';	  
    $this->email->set_newline("\r\n");
					   $this->email->set_mailtype("html");
					  $this->email->from($from); // change it to yours
					  $this->email->to($to );// change it to yours
					  $this->email->subject($subject);
					  $this->email->message($message);
					  $this->email->send();
	$this->session->set_flashdata('new','* One New Property added');
	redirect('manage_properties');
	  }
	}

}
