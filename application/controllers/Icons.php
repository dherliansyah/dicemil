<?php 
	
	class Icons extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->library("session");
		}

		function index(){
			$data["content_page"]="admin/icons";
			$this->load->view("admin/admin_index",$data);
		}
	}