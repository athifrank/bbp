<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lakhs extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('lakhs_mod');

	}
	public function index()
	{   
	       $zone=$this->input->post('zone');
		   $i= $this->input->post('i');
		   $am= $this->input->post('am');
	/* 	 if($id=north){
			$zone='North Bangalore';
		}
		if($id==East)$zone='East Bangalore';
		if($id==South)$zone='South Bangalore';
		if($id==West)$zone='West Bangalore';
		if($id==Central)$zone='Central Bangalore';  */
		
		if($am ==1){
			
			$am = 'AND p.price <= 1000000';
			
		}else if($am ==2){
			
			$am = 'AND p.price >= 1000000 AND p.price <= 2000000';
			
		}else if($am ==3){
			
			$am = 'AND p.price >= 2000000 AND p.price <= 3000000';
			
		}else if($am ==4){
			
			$am = 'AND p.price >= 3000000 AND p.price <= 4000000';
		}else if($am ==5){
			
			$am = 'AND p.price >= 4000000 AND p.price <= 5000000';
		}else if($am ==6){
			
			$am = 'AND p.price >= 6000000 AND p.price <= 7000000';
		}else if($am ==7){
			
			$am = 'AND p.price >= 7000000 AND p.price <= 8000000';
		}

		$query = "SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.zone like '$zone%'";
		//session_start();
		
		$order = " group by i.pid ORDER BY p.price DESC";
		
		//$run = new jcode;
		$where='';
		if($where != '') $query1 = $query .$where.$order;
		else $query2 =$query.$am.$order;
		
		//echo $query1;
		
		$query =$this->db->query($query2);
		$no =$query->result_array();
		if(empty ($no))
		{
				echo '<br><br><div class="td" style="width:1000px">Properties not found for such criteria</div>';
		}
		else
		{						
			$s=1;
			foreach($no as $row)
			{
				$fname=$row['fname'];	
				$ptype=$row['ptype'];
				$id=$row['pid'];
				$bhk=$row['bhk'];
				$tit=$row['tit'];
				$loc=$row['loc'];
				$area=$row['area'];
				$price=$row['price'];
				
				
				$tit=substr($tit, 0, 24-3)."...";
				$loc=substr($loc, 0, 24-3)."...";
				
				if($price == 0)$price = 'Contact for Price'; else $price=number_format("$price",2);
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
						  <div class="img">';
						  
						  echo '</span><span class="tiit">'.$price.'</span>';
						  echo '</span><span class="loc">'.$loc.'</span>';
						  echo'<a href="'.site_url().'slide_property/index/'.$id.'">
						  <img src="'.base_url().'savefiles/'.$fname.'" width="330px" height="200px" />
						  </a></div>
						  <div class="more"><a href="'.site_url().'slide_property/index/'.$id.'">'.$tit.'</a></div>
						  <div class="list">Property Id : '.$id;
						  if(!empty($bhk))echo'<span class="bhk">'.$ptype;
						  echo'<br /></div>
						  <div>
						  <div class="addcom">
							<a class="wishli" title="Wishlist"><img src="'.base_url().'assets/images/wish1.png" width="40" height="30" /></a>
							<a class="wishi" title="Wishlist"><img src="'.base_url().'assets/images/wish.png" width="40" height="30" /></a>
						  </div>
						  <div class="addcom"><input type="checkbox" name="c[]" id="check'.$s.'" value="'.$id.'" onclick="setChecks(this)"> Compare</div>
							<div class="ints" style="float:right; margin-right:20px;">
								<a href="#inline_content" class="inline" onclick="setin('.$id.')">Contact</a>
							</div>
							<ul id="navlist">
								<li id="home"><a href="default.asp"></a></li>
								<li id="prev"><a href="css_intro.asp"></a></li>
								<li id="next"><a href="css_syntax.asp"></a></li>
							</ul>
							<div class="addcom" style="float:right; margin-right:20px;"><button class="share">share</button>
							</div>
						  </div>
						  </div>';
						  $s++;
				}
			}
		}
	}


}
?>