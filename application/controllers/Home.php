<?php

	class Home extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('Productmodel');
			$this->load->model('Usermodel');
		}

		function index(){
			$data["content_page"]="home";
			$data["content_product"]=$this->Productmodel->getMenu();
			$this->load->view("index",$data);
		}

	////////////////////////////////////////// START CONTROLLER REGISTRASI WEB //////////////////////////////////////////// 
		function registrasi(){
				$this->form_validation->set_rules('nama','Nama','trim|required|min_length[2]|max_length[30]');
				$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member_tbl.email]');
				$this->form_validation->set_rules('telepon','NoTelepon','trim|required|min_length[10]|max_length[15]');
				$this->form_validation->set_rules('alamat','Alamat','trim|required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('gender','Gender','trim|required');
				$this->form_validation->set_rules('tanggal_lahir','TanggalLahir','trim|required');
				$this->form_validation->set_rules('username','Username','trim|required|is_unique[member_tbl.username]');
				$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[15]');

				$this->form_validation->set_message('required','{field} Mohon Lengkapi Data Anda terlebih Dahulu ');
				$this->form_validation->set_message('valid_email','Format Email Tidak Benar');
				$this->form_validation->set_message('numeric','No Telepon Harus Angka');
				$this->form_validation->set_message('is_unique','%s Telah Dipakai, Silahkan Ganti Dengan Data Yang Lain');

				if($this->form_validation->run()){
					if($simpan = $this->input->post('submit')){
						
						$this->Usermodel->save();
						redirect(base_url() .'home');	
					}
				}
				else{
					$data["content_page"]="home";
					$data["content_product"]=$this->Productmodel->getMenu();
					$this->load->view("index",$data);
				}
		}

	////////////////////////////////////////// END CONTROLLER REGISTRASI WEB ////////////////////////////////////////////

	////////////////////////////////////////// START CONTROLLER REGISTRASI MOBILE //////////////////////////////////////////// 
		function registrasi_mobile(){
				$this->form_validation->set_rules('nama','Nama','trim|required|min_length[2]|max_length[30]');
				$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[member_tbl.email]');
				$this->form_validation->set_rules('telepon','NoTelepon','trim|required|min_length[10]|max_length[15]');
				$this->form_validation->set_rules('alamat','Alamat','trim|required|min_length[5]|max_length[50]');
				$this->form_validation->set_rules('gender','Gender','trim|required');
				$this->form_validation->set_rules('tanggal_lahir','TanggalLahir','trim|required');
				$this->form_validation->set_rules('username','Username','trim|required|is_unique[member_tbl.username]');
				$this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[15]');

				$this->form_validation->set_message('required','{field} Mohon Lengkapi Data Anda terlebih Dahulu ');
				$this->form_validation->set_message('valid_email','Format Email Tidak Benar');
				$this->form_validation->set_message('numeric','No Telepon Harus Angka');
				$this->form_validation->set_message('is_unique','%s Telah Dipakai, Silahkan Isi Dengan Email Yang Benar');

				if($this->form_validation->run()){
					if($simpan = $this->input->post('submit')){
						
						$this->Usermodel->save();
						redirect(base_url() .'home');	
					}
				}
				else{
					$data["content_page"]="home";
					$data["content_product"]=$this->Productmodel->getMenu();
					$this->load->view("index",$data);
				}
		}

	////////////////////////////////////////// END CONTROLLER REGISTRASI MOBILE ///////////////////////////////////////////////////

	////////////////////////////////////////// START CONTROLLER LOGIN DESKTOP & MOBILE ////////////////////////////////////////////

		function Submit(){
			if($this->Productmodel->LoginCheck($_POST["username"],$_POST["password"])>0){
				$this->session->set_userdata("username",$_POST["username"]);
				redirect(base_url() . "home");
			}else{
				// $data["error"]="Username & Password Wrong";
				redirect(base_url() . 'home/?error2');
			}
		}

	////////////////////////////////////////// END CONTROLLER LOGIN DESKTOP & MOBILE ////////////////////////////////////////////

	////////////////////////////////////////// START CONTROLLER LOGOUT DESKTOP & MOBILE ////////////////////////////////////////////

		function logoutSubmit(){
			$this->session->sess_destroy();
			redirect(base_url() .'home');

		}
		
	////////////////////////////////////////// END CONTROLLER LOGOUT DESKTOP & MOBILE ////////////////////////////////////////////
 }