<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_projects_mod extends CI_model {
	

	public function get_pos()
	{
        $sql="SELECT * FROM fp order by pid desc";
		$query=$this->db->query($sql);
		return $query;

		
	}
	
	public function get_name($pid)
	{
        $sql="SELECT tit FROM fp where pid='$pid'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$tit=$data['tit'];
		}
		return $tit;
		
	}
	public function get_name1($pid)
	{
        $sql="SELECT thumbs FROM fp where pid='$pid'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$t=$data['thumbs'];
		}
		return $t;
		
	}
	
	public function get_thumb($pid)
	{
        $sql="SELECT * FROM gallery where pid='$pid'";
		$query=$this->db->query($sql);
		return $query;

		
	}
	
	public function get_banner($pid)
	{
        $sql="SELECT banner b FROM fp where pid='$pid'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$b=$data['b'];
		}
		return $b;

		
	}
	

	public function delete($gid)
	{
        $sql="SELECT fname FROM gallery where gid='$gid'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$msg=$data['fname'];
		}
		return $msg;		
	}
	
	public function edit($id){
		$sql="SELECT * FROM fp where pid='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		return $row;
	}
	
	public function del_tit($id){
		$sql="SELECT tit FROM fp where pid='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$tit=$data['tit'];
		}
		return $tit;
	}
	public function del_check($id){
		$sql="SELECT count(pid) p FROM `gallery` WHERE pid='$id'";
		$query=$this->db->query($sql);
		$row=$query->result_array();
		foreach($row as $data){
			$check=$data['p'];
		}
		return $check;
	}
}
?>