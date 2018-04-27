<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_search_lakhs extends CI_Controller {

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
		
		
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
			
			//with session
			if($br){
			$ses=$_SESSION['id'];
			$query = "SELECT * FROM image i INNER JOIN properties p on i.pid=p.id inner join wish_list w on p.id=w.p_id where 
			u_id=$ses and p.ptype='$ptype' and p.loc='$loc' and p.br='$br'";
			}else{
			$ses=$_SESSION['id'];
			$query = "SELECT * FROM image i INNER JOIN properties p on i.pid=p.id inner join wish_list w on p.id=w.p_id where 
			u_id=$ses and p.ptype='$ptype' and p.loc='$loc'";
			}

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
						$val=$row['p_id'];
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
								  <a  title="add to Wishlist" class="circle_wish" id="wish1'.$id.'" onclick="wish1('.$id.','.(isset($_SESSION['id']) ? $_SESSION['id'] : '' ).');">
									<i class="fa fa-heart" style="font-size:24px;color:gray;margin-top: 3px;"></i></a>
									
									<a  title="added in Wishlist" class="circle_wish" id="wish'.$id.'" onclick="wish('.$id.','.(isset($_SESSION['id']) ? $_SESSION['id'] : '' ).');">
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
								 $("a#wish1'.$val.'").hide();
								$("a#wish'.$val.'").show();
								
								
							
								  </script>							
								  </div>
								  </div>';
								  $s++;
						}
					}
				}




			
		}else{
			
			//without session	
        if($br){
		$query = "SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.ptype='$ptype' AND p.loc='$loc' AND p.br='$br'";
		}else{
		$query = "SELECT * FROM image i JOIN properties p ON i.pid = p.id WHERE p.ptype='$ptype' AND p.loc='$loc'";	
		}
		
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
						  <a  title="add to Wishlist" class="circle_wish" id="wish1" onclick="wish1('.$id.','.(isset($_SESSION['id']) ? $_SESSION['id'] : '' ).');">
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


}
?>