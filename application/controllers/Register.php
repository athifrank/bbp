<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('image_lib');
		$this->load->helper('captcha');
		$this->load->model("register_mod");	
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
		$this->load->view('register', $data);
    }
	
	public function refresh(){
		// Captcha configuration
		$config = array(
			'img_path'      => 'captcha/',
			'img_url'       => base_url().'captcha/',
			'img_width'     => '150',
			'img_height'    => 50,
			'word_length'   => 4,
			'font_size'     => 18,
			
		);
		$captcha = create_captcha($config);
		
		// Unset previous captcha and store new captcha word
				$_SESSION['captchaWord']=$captcha['word'];
		
		// Display captcha image
		echo $captcha['image'];
	  }
		
     public function registration(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address','is_unique[users.eid]',array(
		'is_unique'=>' Email id is already registered.'), 'trim|required|valid_email');
		$this->form_validation->set_rules('pass1', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('pass2', 'Password Confirmation', 'trim|required|matches[pass1]');
		$this->form_validation->set_rules('name', 'Full name', 'trim|required');
		$this->form_validation->set_rules('add', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'city', 'trim|required');
		$this->form_validation->set_rules('coun', 'Country', 'trim|required');
		$this->form_validation->set_rules('zip', 'zip code', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile No', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Captcha');



			if($this->form_validation->run() == FALSE)
			{				
				$this->index();
			}			
			else{				
				  if (strcasecmp($this->session->userdata('captchaWord'), $_POST['captcha']) == 0) {
				  $this->data_seed();
                 } else 
				 {
			  echo "<script type='text/javascript'> alert('Invalid security code'); </script>";
			        $this->index();
                 }							
			   }
				
			}
		public function data_seed(){
				if($this->register_mod->insert())
				{
				   $mail=$this->input->post('email');
		           $pass=sha1($this->input->post('pass1'));
		           $name=$this->input->post('name');
					$this->code_mail($name,$mail,$pass);
					$this->session->set_flashdata('log_view','<img src="'.base_url().'assets/images/star.gif" />Registration completed. Kindly check your mail for activation process');
					redirect('login','refresh');
				}
				else
				{
					//$this->load->view('registration');
					$this->index();			
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


		

				
			

?>