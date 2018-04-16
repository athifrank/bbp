<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->model('index_mod');
		$data['result']=$this->index_mod->image_slide();
		$data['proupdate']=$this->index_mod->pro_update();
		$data['featurepro']=$this->index_mod->feature_pro();
		$this->load->view('index',$data);
	}
}

