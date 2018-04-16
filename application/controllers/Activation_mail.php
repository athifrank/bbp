<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Activation_mail extends CI_Controller {	
	public function  __construct(){
		parent::__construct();
		$this->load->database();
	}
	public function index()
	{
		$this->load->view('accounts/activation_mail');
	}	
	public function action(){

	$mail=$this->input->post('mail');
	if(empty($mail))
	{
		$this->session->set_flashdata('id','Email ID is required');
		redirect('activation_mail');
		//header ("Location: ../activation_mail.php?a=8i5");
	}
	else
	{
		$query=$this->db->query("SELECT COUNT(eid),eid,name,status FROM users WHERE eid LIKE '$mail'");
		$ro=$query->result_array();
		foreach($ro as $row){
		$check=$row['COUNT(eid)'];
		$name=$row['name'];
		$mail=$row['eid'];
		$status =$row['status'];
		}
		if($check == 0) {
			$this->session->set_flashdata('invalid','Invalid Email-Id entered');
		redirect('activation_mail');
			//redirect ("Location: ../activation_mail.php?a=8i2");
		}
		if($status == 1){
			$this->session->set_flashdata('already','User account already activated');
		redirect('login');
			//header ("Location: ../index.php?a=8i3");
		}
		else
		{
			$this->code_mail($name,$mail,$status);
			$this->session->set_flashdata('mail','<img src="'.base_url().'assets/images/star.gif" />A mail has been sent for activation process');
		redirect('login');
		    //header ("Location: ../index.php?a=m8i");
		}
	}
	}	
	public function code_mail($name,$mail,$code){
		     $this->load->library('email');
					$url = ''.site_url().'activation?mail='.$mail.'&code='.$code;
					$email ='noreply@bangalorebestproperty.com';
		            $to    = $mail;
		             $subject  = 'Account activation - bangalorebestproperty.com';
					$message  = '<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
					<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/>
					<p><br />Dear '.$name.', </p>
					<p>Thank you for choosing us</p>
					<p> To confirm your registration, you need to activate your account by clicking the activation link given below</p>
					<p>Click here  to <a href='.$url.'>activate</a> your account</p>
					<p>Incase   any issues regarding account activation. click <a href="'.site_url().'activation_mail">here</a> to resend activation link </p>
					<p style="margin-top:30px;">Regards ,<br />Bangalorebestproperty.<br /><a href="http://www.bangalorebestproperty.com/">www.bangalorebestproperty.com</a></p>';

					  $this->email->set_newline("\r\n");
					   $this->email->set_mailtype("html");
					  $this->email->from($email); // change it to yours
					  $this->email->to($mail );// change it to yours
					  $this->email->subject($subject);
					  $this->email->message($message);
					  $this->email->send();		
								  
			  }
}
	