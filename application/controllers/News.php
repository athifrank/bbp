<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('news_mod');

	}
	public function index()
	{  

      $data['query']=$this->news_mod->pro_doc();
	  $this->load->view('news',$data);
	}

}
?>