<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_search_bhk extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('lakhs_mod');
        $this->load->model('Zonal_wishlist_mod');
	}
	public function index()
	{   	     
		   $i= $this->input->post('i');
		   $am= $this->input->post('am');
		   
		    $ptype= $this->input->post('ptype');
		    $loc= $this->input->post('location');
		   $br= $this->input->post('type');
		   
		   
		    if(isset($_SESSION['id'])){
			   $wishlist=$this->Zonal_wishlist_mod->get_pro($_SESSION['id']); 
			  }else{
				  $wishlist=$this->Zonal_wishlist_mod->get_pro('0');  
			  }
	/* 	if($i==1)$zone='North Bangalore';
		if($i==2)$zone='East Bangalore';
		if($i==3)$zone='South Bangalore';
		if($i==4)$zone='West Bangalore';
		if($i==5)$zone='Central Bangalore'; */
		
		foreach($wishlist as $row ){  $val=$row['p_id'];}
		
		if($am ==1){
			
			$am = 'AND p.bhk = 1';
			
		}else if($am ==2){
			
			$am = 'AND p.bhk = 2';
			
		}else if($am ==3){
			
			$am = 'AND p.bhk = 3';
			
		}else if($am ==4){
			
			$am = 'AND p.bhk = 4';
		}

		if($br){
		$query = "SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.ptype='$ptype' AND p.loc='$loc' AND p.br='$br'";
		}else{
		$query = "SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.ptype='$ptype' AND p.loc='$loc'";	
		}
		
		$order = " group by i.pid ORDER BY p.price DESC";
		
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
						  
						  echo '</span><span class="tiit">Rs &nbsp;'.$price.'</span>';
						  echo '</span><span class="loc">'.$loc.'</span>';
						  echo'<a href="'.site_url().'slide_property/index/'.$id.'">
						  <img src="'.base_url().'savefiles/'.$fname.'" width="330px" height="200px" />
						  </a></div>
						  <div class="more"><a href="'.site_url().'slide_property/index/'.$id.'">'.$tit.'</a></div>
						  <div class="list">Property Id : '.$id;
						  if(!empty($bhk))echo'<span class="bhk">'.$ptype.'</span>';
						  echo'<br /></div>
						  <div>
						    <div class="addcom">
							<a  title="add to Wishlist" class="circle_wish" id="wish1" style="" onclick="wish1('.$id.','.(isset($_SESSION['id']) ? $_SESSION['id'] : '' ).');">
							<i class="fa fa-heart" style="font-size:24px;color:gray;margin-top: 3px;"></i></a>
							
							<a  title="added in Wishlist" class="circle_wish" id="wish" onclick="wish('.$id.','.(isset($_SESSION['id']) ? $_SESSION['id'] : '' ).');">
							<i class="fa fa-heart" style="font-size:24px;color:green;margin-top: 3px;"></i></a>
							
						  
						  </div>
						  
						  <div class="addcom" style="margin: 14px;"><input type="checkbox" name="c[]" id="check'.$s.'" value="'.$id.'" onclick="setChecks(this)"> Compare</div>
							<div class="ints" style="float:right; margin-right:20px;">
								<a href="#ex1" rel="modal:open" onclick="setin('.$id.')">Contact</a>
							</div>
							
							<ul id="navlist">
								<li id="home"><a href="default.asp"></a></li>
								<li id="prev"><a href="css_intro.asp"></a></li>
								<li id="next"><a href="css_syntax.asp"></a></li>
							</ul>
							
							<div class="" style="float:right; margin-right:20px;    margin-right: 84px;margin-top: -44px;">
							<div class="dropup">
							  <button class="dropbtn">share</button>
							  <div class="dropup-content">
							<a  target="__blank" 
							href="https://www.facebook.com/sharer/sharer.php?u='.site_url().'slide_property/index/'.$id.'"
							class="fb-xfbml-parse-ignore">
							<img style="width: 58%;height: 28px;" src="https://use.fontawesome.com/releases/v5.0.10/svgs/brands/facebook-square.svg">
                            </a>
						   <a href="https://plus.google.com/share?url='.site_url().'slide_property/index/'.$id.'" onclick="javascript:window.open(this.href,,menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600);return false;">							
							  <img style="width: 58%;height: 28px;" src="https://use.fontawesome.com/releases/v5.0.10/svgs/brands/google-plus-square.svg">
							</a>
							  </div>
							</div>
							</div>
							
							<script>
						 $("a#wish1").show();
                        $("a#wish").hide();
						
                          </script>	
						
						  </div>
						  </div>';
						  $s++;
				}
			}
		}


}

}
?>