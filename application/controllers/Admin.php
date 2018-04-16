<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('admin_mod');

	}
	public function index()
	{  
	 $this->load->view('accounts/index1');
	}
	public function home()
	{  
	 $this->load->view('accounts/home1');
	}
	
	public function login_admin()
	{  

		$use1=$this->input->post('user');
		$pas1=$this->input->post('pass');
		$pas2=sha1($pas1);

		if(empty($use1) || empty($pas1))
		{
	       $this->session->set_flashdata('all','All the fields are required');
			redirect("admin/index");	
		}
		else
		{

			$row=$this->admin_mod->login();
			foreach($row as $data){
			 $use=$data['use'];
			 $pas=$data['pass'];
			 $name=$data['name'];
			}
			if($use==$use1 && $pas==$pas2)
			{
				$_SESSION['admin'] ='1';
				$_SESSION['admin_name'] = $name;
				$this->load->view('accounts/home1');
				//header ("Location: ../home1.php");
			}
			else
			{
			$this->session->set_flashdata('invalid','Invalid Username and Password');
			redirect("admin/index");
				//header('location: ../index1.php?a=i85');
			}
		}
	}
	
	public function logout(){
		$this->load->view('accounts/logout1');
	}

			  

}
?>