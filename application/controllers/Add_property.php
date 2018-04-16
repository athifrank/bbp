<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_property extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('add_property_mod');

	}
	public function index()
	{  
	/*  $data['zone']=$this->add_property_mod->get_zone();
	  $data['aa']=$this->add_property_mod->get_zone();
	   $data['ptype']=$this->add_property_mod->ptype();
	    $data['bhk']=$this->add_property_mod->bhk();
		  $data['loc']=$this->add_property_mod->loc();
		   $data['pfrom']=$this->add_property_mod->pfrom();
		   $data['bank']=$this->add_property_mod->bank(); */
                $tit=$this->input->post(1);
				$loc=$this->input->post(2);
				$lmark=$this->input->post(3);
				 $zone=$this->input->post(4);
				 $area=$this->input->post(5);
			    $price=$this->input->post(6);
			    $aa=$this->input->post(7);
			$ptype=$this->input->post(8);
			$pfrom=$this->input->post(9);
			  $bank=$this->input->post(10);
			   $nc=$this->input->post(11);
			    $br=$this->input->post(12);
				 $bhk=$this->input->post(13);
			
			   $data=array('zone'=>$zone,'tit'=>$tit,'loc'=>$loc,'aa'=>$aa,'ptype'=>$ptype,'bhk'=>$bhk,'bank'=>$bank,'pfrom'=>$pfrom,'br'=>$br);	
		
 
		   
     $data['get_loc']=$this->add_property_mod->get_loc();	
     $this->load->view('accounts/add_property',$data);	
    }
	
	public function insert_data(){
		
	$tit=str_replace("\'", "&#39;", $this->input->post('tit'));
	$loc=$this->input->post('loc');
	$lmark=str_replace("\'", "&#39;", $this->input->post('lmark'));
	$zone=$this->input->post('zone');
	$area=$this->input->post('area');
	$price=$this->input->post('price');
	$aa=$this->input->post('aa');
	$ptype=$this->input->post('ptype');
	$pfrom=$this->input->post('pfrom');
	$bank=$this->input->post('bank');
	$nc=str_replace("\'", "&#39;", $this->input->post('nc'));
	$br=$this->input->post('br');
	$bhk=$this->input->post('bhk');
	
	$room=$this->input->post('room');
	$broom=$this->input->post('broom');
	$hall=$this->input->post('hall');
	$troom=$this->input->post('troom');
	$park=$this->input->post('park');
	$floor=$this->input->post('floor');
	$amen=str_replace("\'", "&#39;", $this->input->post('amen'));
	$rmark=str_replace("\'", "&#39;", $this->input->post('rmark'));
	$face=$this->input->post('face');
	$leven=$this->input->post('leven');
	$twel=$this->input->post('twel');
	//$run->db_close();
	//session_start();
	$uid = $_SESSION['id'];
    $date=date('d-m-Y');
	if (empty($tit) || empty($loc) || empty($lmark) || empty($zone) || empty($area)|| empty($price) || empty($aa) || empty($ptype) || empty($pfrom) || empty($bank) || empty($nc) || empty($br))
	{
	/* 	$tit=$tit;
		$loc=base64_encode($loc);
		$lmark=base64_encode($lmark);
		$zone=base64_encode($zone);
		$area=base64_encode($area);
		$price=base64_encode($price);
		$aa=base64_encode($aa);
		$ptype=base64_encode($ptype);
		$pfrom=base64_encode($pfrom);
		$bank=base64_encode($bank);
		$nc=base64_encode($nc);
		$br=base64_encode($br);
		$bhk=base64_encode($bhk); */
		$this->session->set_flashdata('field','*Please fill all the required fields');
		$this->index();
	   //header ("Location: ../add_property?a=2i5&1=$tit&2=$loc&3=$lmark&4=$zone&5=$area&6=$price&7=$aa&8=$ptype&9=$pfrom&10=$bank&11=$nc&12=$br&13=$bhk");
	}
	else
	{
		if(empty($room))$room='0'; if(empty($broom))$broom='0'; if(empty($hall))$hall='0';if(empty($troom))$troom='0'; if(empty($floor))$floor='0';
		if(empty($park))$park='Not updated'; if(empty($amen))$amen='Not updated'; if(empty($rmark))$rmark='Not updated'; 
		if(empty($l1))$l1='Not updated'; if(empty($l2))$l2='Not updated'; if(empty($face))$face='Not updated';
		//$run->db_open();
		//$run->dates();
		
		#changing first character to upper case
		$tit=ucwords(strtolower($tit));
		$lmark=ucwords(strtolower($lmark));
		$nc=ucwords(strtolower($nc));
		$face=ucwords(strtolower($face));
		$amen=ucwords(strtolower($amen));
		$rmark=ucwords(strtolower($rmark));
		
		$query=$this->db->query("INSERT INTO properties (`uid`,`date`,`tit`,`loc`,`lmark`,`zone`,`area`,`price`,`aa`,`ptype`,`pfrom`,`bank`,`nc`,`br`,`room`,`broom`,`hall`,`troom`,`park`,`floor`,`amen`,`rmark`,`l1`,`l2`,`bhk`,`face`)					 VALUES('$uid','$date','$tit','$loc','$lmark','$zone','$area','$price','$aa','$ptype','$pfrom','$bank','$nc','$br','$room','$broom','$hall','$troom','$park','$floor','$amen','$rmark','$leven','$twel','$bhk','$face');");
		
		if($query){
			redirect('add_image');
			//header ("Location: ../add_image.php");
			//echo 'done';
		}
		else 
		{
			$this->session->set_flashdata('server','* Server busy please try later');
			$this->index();
			//header ("Location: ../add_property.php?a=qne");
			//echo 'error';
		}
		//$run->db_close();
	}
		
	}

}
?>