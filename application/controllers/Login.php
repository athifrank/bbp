<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->database();

	}
	
	public function index()
	{
		$this->load->view('accounts/index');
	}
	
	public function user_log(){

		 $use1=$this->input->post('user');
		 $pas1=$this->input->post('pass');
		 $pas2=sha1($pas1);

		if(empty($use1) || empty($pas1))
		{
			$this->session->set_flashdata('field','All the fields are required');
			$this->load->view('accounts/index');	
		}
		else
		{
			$query=$this->db->query("SELECT * FROM users where eid like '$use1'");
			$row=$query->result_array();
			foreach($row as $data){
			$use=$data['eid'];
			$pas=$data['pass'];
			$name=$data['name'];
			$id=$data['id'];
			$s=$data['status'];
			}
			$use1=strtolower($use1);
			if(isset($s) && $s!= 1) {
			$this->session->set_flashdata('acc','Your account not yet Activated');
			 $this->load->view('accounts/index');
			}
			
			else
			{
				if(isset($use) && $use==$use1 && $pas==$pas2)
				{
					//session_start();
					$_SESSION['user'] = "1";
					$_SESSION['name'] = $name;
					$_SESSION['id'] = $id;
					$_SESSION['type'] = "user";
					$this->load->view('accounts/home');
				}
				else
				{
				  $this->session->set_flashdata('invalid','Invalid Username and Password');
			      $this->load->view('accounts/index');
				}
			}
		
		}
	}
	public function user_home(){
		$this->load->view('accounts/home');
	}
}
