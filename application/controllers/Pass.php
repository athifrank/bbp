<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pass extends CI_Controller {


	public function index()
	{
		if (!(isset($_SESSION['user']) && $_SESSION['user'] != '')){
			header ("Location: login");
		}
		else{ 
			header ("Location: add_property");
		}
	}
}
