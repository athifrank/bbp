<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zonal_search extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('slider1_mod');
		$this->load->model('zonal_search_mod');
        $this->load->model('Zonal_wishlist_mod');
	}
	public function index()
	{
      $i=$this->uri->segment(3);
	  $data['zone_id']=$i;
      $data['showproperties']=$this->zonal_search_mod->zonal_search( $i);
	  $data['wishlist']=$this->Zonal_wishlist_mod->get_pro($_SESSION['id']); 
 	  //print_r($data);
	  $data['location_search']=$this->zonal_search_mod->location_search( );
	  $data['price_min']=$this->slider1_mod->price_min();
	  $data['price_max']= $this->slider1_mod->price_max();
	  $data['area_min']= $this->slider1_mod->area_min();
	  $data['area_max']= $this->slider1_mod->area_max();
	  $data['bhk_min']= $this->slider1_mod->bhk_min();
	  $data['bhk_max']= $this->slider1_mod->bhk_max();

     $this->load->view('zonal_search',$data); 
	}
	
	public function show_pro()
	{ 

	$s= $this->input->post('s');
    $z1= $this->input->post('z1');
	$z2=$this->input->post('z2');
	$z3= $this->input->post('z3');
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
		$this->showproperties($where, $z1,$z2,$z3,$s);
	}

	}

	//Dispaly properties
	public function showproperties($where='' ,$z1,$z2,$z3,$s) {
		if(empty($z2) && empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' ";
		if(!empty($z2) && empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' and p.loc = '$z2' ";
		if(empty($z2) && !empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' and p.br = '$z3' ";
		if(!empty($z1) && !empty($z2) && !empty($z3))
		$query = "SELECT * FROM image i , properties p WHERE i.pid=p.id and p.ptype = '$z1' and p.loc = '$z2' and p.br= '$z3' ";
		
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
		$this->load->view('inline_custom_search',$data);

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