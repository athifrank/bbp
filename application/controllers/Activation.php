<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activation extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();

	}

	public function index()
	{
		$email=$this->input->get('mail');
			$code=$this->input->get('code');
		$br ='<br><br><br><br><br><br><br><br>';
     if(!empty($email))
	{
		$result = $this->db->query("SELECT id, status FROM users WHERE  eid LIKE '$email'");
		$ro =$result->result_array();
		foreach($ro as $row ){
		$id=$row['id'];
		$status=$row['status'];
		}
		if($status == 1){

		$data['already']= $br.'<div class="dis">User account already activated. click <a href="'.site_url().'login">here</a> to login</div>';
		$this->load->view('accounts/activation',$data);
		}
		else
		{
			if($status == $code)
			{
				$query=$this->db->query("UPDATE users SET status= 1 where id=$id;");
				$data['activate']= $br.'<div class="dis">User account activated. click <a href="'.site_url().'login">here</a> to login</div>';
				$this->load->view('accounts/activation',$data);
			}
			else{
				
			$data['page']= $br.'<div class="dis">Page access denied.</div>';
			$this->load->view('accounts/activation',$data);
			}
		}
		
	}
    else{
		$data['view']= $br.'<div class="dis">Page cannot be viewed.</div>';
         $this->load->view('accounts/activation',$data);		
	}
	}
}
?>