<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Knowledge_house extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('knowledge_house_mod');

	}
	public function index()
	{  

      $data['getimages']=$this->knowledge_house_mod->know();
	  $this->load->view('knowledge_house',$data);
	}
	public function view()
	{  
       $id=$this->uri->segment(3);
      $data['getimages']=$this->knowledge_house_mod->view_know($id);
	  $this->load->view('view_knowledge_house',$data);
	}

}
?>