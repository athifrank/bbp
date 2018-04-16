<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_location extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('pagination');
		$this->load->model('manage_location_mod');

	}
	public function index()
	{ 
     
        //pagination settings
        $config['base_url'] = site_url('manage_location/index');
        $config['total_rows'] = $this->db->count_all('location_list');
        $config['per_page'] = "80";
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //call the model function to get the department data
        $data['result'] = $this->manage_location_mod->get_loc($config['per_page'], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        //load the department_view

	  $this->load->view('accounts/manage_location',$data);
	}
	
	public function add_loc(){

	$name=$this->input->post('name');

	if( $name == null || $name == 'Add new Location'){
		$this->session->set_flashdata('all','* All fields are required');
		redirect("manage_location");
      		//header ("Location: ../manage_location.php?a=kii");
	}
	else
	{
		$query1=$this->db->query("SELECT id FROM location_list;");
		$no =$query1->num_rows();
		$no1 = ceil($no /80);
		$query=$this->db->query("INSERT INTO location_list(`name`)VALUES('$name');");
		if($query){
			$this->session->set_flashdata('new','* One new location added');
		redirect("manage_location/index/$no1");
		//header ("Location: ../manage_location.php?a=ki9&page=$no1");
		}
		else{
			$this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_location");
	    //	header ("Location: ../manage_location.php?a=qne");
		}
	}
	}
	
	public function del_loc(){
		$id=$this->uri->segment(3);
		$data['id']=$id;
		$data['name']= $this->manage_location_mod->delete($id);
		$this->load->view('accounts/del_location',$data);
	}
	
	public function del_action(){

	$id=$this->input->get('id');
	$s = ceil($id /80);
	$query=$this->db->query("DELETE FROM location_list where id=$id;");
	if($query){
		$this->session->set_flashdata('one','* One new location Removed');
		redirect("manage_location");
    //header ("Location: ../manage_location.php?a=1ji&page=$s");
	}
	else{
	    $this->session->set_flashdata('server','* Server busy please try later');
		redirect("manage_location");	
	//header ("Location: ../manage_location.php?a=qne$page=$s");
	}
	}
	

}
?>