<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide_property extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('id_search_mod');
	}
	public function index()
	{
		$id = $this->uri->segment(3);
		$query=$this->id_search_mod->id_find($id);
		      $row=$query->result_array();
		      $data['result']=$row;
			  
			  foreach( $row as $price){
				  $money=$price['price'];
				  $nc=$price['nc'];
			  }
			   $data['money']=$this->money($money);
			   $data['nc']=$this->string_br($nc);
			   $data['id']=$id;
			 $this->load->view('slide_property_details',$data);
			}
	
	
    
	
		
	#Character limit in a string
	public function cut_string($string, $len)
	{
		$s1=strlen($string);
		if($s1 > $len) 
		$string=substr($string, 0, $len-3)."...";
		return $string;
		
	}
	
		#@ String br
	function string_br($string)
	{
		$string = $string.".";
		$string = str_replace(',', ',<br>', $string);
		return $string;
	}
	
	#Money format with seperator
	public function money($number)
	{  
	    //$number = 1234.56;
		//setlocale(LC_MONETARY, "en_IN");
        //$money = money_format("%(#10n", $number);
		$money=number_format("$number",2)."<br>";
		#number_format($number);
		return $money;
	}
	

}

?>