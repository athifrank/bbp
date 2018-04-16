<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider1 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('slider1_mod');
	}
	public function index()
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
		if(empty($no))
		{
				echo '<br><br><div class="td">Properties not found for such criteria</div>';
		}
		else
		{		foreach($no as $row){	     
			    $fname=$row['fname'];	
				$ptype=$row['ptype'];
				$id=$row['pid'];
				$bhk=$row['bhk'];
				$tit=$row['tit'];
				$loc=$row['loc'];
				$area=$row['area'];
				echo $price=$row['price'];
				
				$tit=$this->cut_string($tit, 24);
				$loc=$this->cut_string($loc, 24);
				
				if($price == 0)$price = 'Contact for Price'; else $price = $this->money($price);
				if(empty($fname))
				{
					echo '<div class="box">
						  <div><br>Invalid Property</div>
						  <div></div>
						  </div>';
				}
				else
				{
					$lc=$loc;
					$TS=  md5("9223372036854775805: " . date("Y-m-d g:i:s ",  9223372036854775805));
					echo '<div class="box1">
						  <div class="img">
						  <a href="property_details.php?i='.$id.'&PropertyTitle='.$tit.'&Location='.$lc.'&TS='.$TS.'">
						  <img src="'.base_url().'/thumbs/'.$fname.'" /></a>
						  <div class="more"><a href="property_details.php?i='.$id.'&PropertyTitle='.$tit.'&Location='.$lc.'&TS='.$TS.'">More details</a></div>
						  </div>
						  <div class="list">Property Id : '.$id.'<br>Tittle : '.$tit.'<br />Type : '.$ptype;
						  if(!empty($bhk))echo'<span class="bhk">('.$bhk.' bhk)</span>';
						  echo'<br />Location : '.$loc.'<br />Area : '.$area.'<br />Price : '.$price.'</div>
						  <div>
							<div class="addcom"><input type="checkbox" name="c[]" id="check'.$s.'" value="'.$id.'" onclick="setChecks(this)"> Add to compare</div>
							<div class="ints" style="float:right; margin-right:20px;">
								<a href="#inline_content" class="inline" onclick="setin('.$id.')">I am Interested</a>
							</div>
						  </div>
						  </div>';
						  $s++;
				}
			}
		}

	}
	

	
		#Money format with seperator
	public function money($number)
	{  
	    //$number = 1234.56;
		setlocale(LC_MONETARY, "en_IN");
        $money = money_format("%.2n", $number);
		#number_format($number);
		return $money;
	}
	
		#Character limit in a string
	public function cut_string($string, $len)
	{
		$s1=strlen($string);
		if($s1 > $len) 
		$string=substr($string, 0, $len-3)."...";
		return $string;
		
	}

	
}
?>