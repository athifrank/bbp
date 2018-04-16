<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('contactus_mod');

	}
	public function index()
	{  
       	// Captcha configuration
		$config = array(
			'img_path'      => 'captcha/',
			'img_url'       => base_url().'captcha/',
			'img_width'     => '150',
			'img_height'    => 50,
			'word_length'   => 4,
			'font_size'     => 18
		);
		$captcha = create_captcha($config);
		
		// Unset previous captcha and store new captcha word
		$_SESSION['captchaWord']=$captcha['word'];
		// Send captcha image to view
		$data['captchaImg'] = $captcha['image'];
		
		// Load the view
      //$data['query']=$this->news_mod->pro_doc();
	  $this->load->view('contactus',$data);
	}
	
	     public function feedback(){
				
				 if (strcasecmp($this->session->userdata('captchaWord'), $_POST['captcha']) == 0) {
					 
					$name=$this->input->post('name');
					$mail=$this->input->post('eid');
					$mobi=$this->input->post('mobile');
					$feed=$this->input->post('feed');
					$code=$this->input->post('security_code');
					 $this->feed_mail($name,$mail,$mobi,$feed,$code);
				  //echo 'success';  ///send mail feedback_mail.php
                 } else 
				 {
			  echo "<script type='text/javascript'> alert('Invalid security code'); </script>";
			        $this->index();
                 }							
			   
				
			}
			
			
			public function feed_mail($name,$mail,$mobi,$feed,$code){
				
	
	if(empty($mobi)) $mobi='Not provided'; if(empty($name)) $name='Anonymous';
		
		#mail 
		$from = "Customer@bangalorebestproperty.com";
		$to    = "contact@bangalorebestproperty.com";
		$subject  = 'Feedback';
			
		$message  = '<html>
					<head></head>
					
					<body>
					<div>
					<span style="font-size:24px; font-weight:bold;"><span style="color:#eb7200;">Bangalore</span> <span style="color:#4c9903;">Best</span> 
					<span style="color:#0173e6;">Property</span></span><br /><hr  style="width:500px; float:left; border:#0173e6 2px solid;"/>
					<br />
					
					Dear admin,
					<p>Feedback from visitor.<br /><br />
					<span style="color:red">'.$feed.'</span>
					<br /><br />
					You can contact me with the information i have provided<br /><br />
					Name: '.$name.'<br />
					Mobile:'.$mobi.'<br />
					Email: '.$mail.'
					</p>
																									
					Regards ,<br />
					Bangalorebestproperty.</div>
					</body>
					</html>';
					
					 $this->email->set_newline("\r\n");
					   $this->email->set_mailtype("html");
					  $this->email->from($from); // change it to yours
					  $this->email->to($to );// change it to yours
					  $this->email->subject($subject);
					  $this->email->message($message);
					  $send=$this->email->send();
		
		if($send){
			$this->session->set_flashdata('feed','* Feedback successfully sent');
			redirect("contactus");
			//header ("Location: contactus.php?a=ki0"); 
		}
		else{
			
			$this->session->set_flashdata('server','*SMTP error try again later');
			redirect("contactus");
			//header ("Location: contactus.php?a=qne");
		}
	
			}
			

			  

}
