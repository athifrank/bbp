<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fpass extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->database();

	}
	
	public function index()
	{
		$this->load->view('accounts/fpass');
	}
	
	public function action()
	{
	$mail=$this->input->post('mail');
	if(empty($mail))
	{
		$this->session->set_flashdata('id','Email ID is required');
		redirect('fpass');
		//header ("Location: ../fpass.php?a=8i5");
	}
	else
	{
				$query=$this->db->query("SELECT COUNT(eid),id,eid,name FROM users WHERE eid LIKE '$mail'");
				$ro=$query->result_array();
				foreach($ro as $row){
				$check=$row['COUNT(eid)'];
				$id=$row['id'];
				$name=$row['name'];
				$eid=$row['eid'];
				}
				if($check == 0){
					$this->session->set_flashdata('invalid','Invalid Email-Id entered');
		           redirect('fpass');
					//header ("Location: ../fpass.php?a=8i2");
					}				
				else
				{
						$key=$this->random_key();
						$key1=sha1($key);
						$email ='noreply@bangalorebestproperty.com';
						$to    = $mail;
						$subject  = 'Password request';
						$message  = '
						<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
						<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/>
						<p><br />Dear '.$name.', </p>
						<p>You have requested for a new password </p>
						<p> Your login details are as follows:</p>
						<p>Username: <span style="text-decoration:underline; color:#0033CC;">'.$eid.'</span><br />
						password: '.$key.'</p>
						<p>Please change your password when you login into your account</p>
						<p style="margin-top:30px;">Regards ,<br />Bangalorebestproperty.<br /><a href="http://www.bangalorebestproperty.com/">www.bangalorebestproperty.com</a>
						</p>';
						$this->load->library('email');
						 $this->email->set_newline("\r\n");
					   $this->email->set_mailtype("html");
					  $this->email->from($email); // change it to yours
					  $this->email->to($to);// change it to yours
					  $this->email->subject($subject);
					  $this->email->message($message);
					  $sent=$this->email->send();
							
							if($sent)
							{
									$query=$this->db->query("UPDATE users SET pass='$key1' where id=$id");
									$this->session->set_flashdata('new','<img src="'.base_url().'assets/images/star.gif" />New Password has been generated and mailed to your Email address, Please check your mail');
		                             redirect('login');
									//header ("Location: ../index.php?a=i87");
							}
							else
							{
								$this->session->set_flashdata('server','SMTP server error Please try later');
		                        redirect('fpass');
								//header ("Location: ../fpass.php?a=i86");
							}
				}
	}
	}
	
	public function random_key() #@ Generate Random Password
	{
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;
		while ($i <= 7) 
		{
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}
	
	
}