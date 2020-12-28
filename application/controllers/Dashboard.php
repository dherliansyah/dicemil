<?php

	class Dashboard extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model("Productmodel");
			$this->load->library("session");
		}

		function index(){
			$data["content_page"]="admin/dashboard";
			$data["content_ultah"]=$this->Productmodel->getUltah();
			// var_dump($data["content_ultah"]);exit;
			$this->load->view("admin/admin_index",$data);
		}
	}