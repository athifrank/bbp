<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zonal_wishlist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Zonal_wishlist_mod');

	}
	public function index()
	{
      $data['wishlist']=$this->Zonal_wishlist_mod->get_pro($_SESSION['id']);  
     $this->load->view('zonal_wish',$data); 
	}
	
	public function add()
	{
	  $data['get_value']=$this->Zonal_wishlist_mod->get_val($_SESSION['id']);
      $i=$this->input->post('id');
	  $col=$this->input->post('col');
	  $user=$this->input->post('user');
      $this->Zonal_wishlist_mod->add_list($i,$col,$user);
	}
	
	public function show_pro()
	{ 

	$s= $this->input->post('s');
	$price_min = $this->input->post('price_min');
   	$price_max = $this->input->post('price_max');
	$area_min = $this->input->post('area_min');
	$area_max =$this->input->post('area_max');
	$bhk_min = $this->input->post('bhk_min');
	$bhk_max = $this->input->post('bhk_max');
    
    if($s ==1) $s="asc"; else $s="desc";

//Where condition
	if(($price_min!=''&&$price_max!='') || ($area_max!=''&&$area_max!='') || ($bhk_max!=''&&$bhk_max!='')) 
	{
    	$where = "and price >= $price_min and price <= $price_max and area >= $area_min and area <= $area_max and bhk >= $bhk_min and bhk <= $bhk_max";
		$this->showproperties($where,$s);
	}

	}

	//Dispaly properties
	public function showproperties($where ,$s) {
	
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id ";
		
		$order = " group by i.pid ORDER BY p.price $s";
		
		if($where != ''){
			$query1 = $query .($where).$order;
		}else
		{
		 $query1 =$query.$order;
		}
		//echo $query1;
		
		$query = $this->db->query( $query1);
		//print_r($query);
		$no =$query->result_array();
        $data['showproperties']=$no;
		$this->load->view('inline_custom_search_price',$data);

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