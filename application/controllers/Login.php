<?php

	class Login extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Productmodel');
			$this->load->library('session');
		}

		function index(){
			$this->load->view("admin/login");
		}

		function loginSubmit(){

			if($this->Productmodel->checkLogin($_POST["username"],$_POST["pass"])>0){
				$this->session->set_userdata("username_admin",$_POST["username"]);
				redirect(base_url() . 'Table');
			}else{
				$data["loginerror"]="Username & Password Wrong";
				$this->load->view("admin/login",$data);
			}
		}

		function logOut(){
			$this->session->sess_destroy();
			$this->load->view("admin/login");
		}
	}