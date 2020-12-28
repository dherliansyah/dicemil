<?php

	class Diskon extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model("Productmodel");
			$this->load->library("session");
		}

		function index(){
			$data["content_page"]="admin/diskon";
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			$data["laporan_diskon"]=$this->Productmodel->getDiskonAdmin();
			// var_dump($data["laporan_diskon"]);exit;
			$this->load->view("admin/admin_index",$data);
		}

		function addProduct(){
			$keterangan_diskon      = $_POST["keterangan_diskon"];
			$kategori_diskon        = $_POST["kategori_diskon"];

			$sql ="INSERT INTO diskon_tbl (keterangan_diskon,kategori_diskon)
					VALUES('" . $keterangan_diskon ."','" . $kategori_diskon ."' )";

			$query=$this->db->query($sql);

			redirect(base_url() . "Diskon");
		}

		function EditproductSubmit(){
			$id_diskon          = $_POST["id_diskon"];
			$keterangan_diskon  = $_POST["keterangan_diskon"];
			$kategori_diskon    = $_POST["kategori_diskon"];
			$diskon             = $_POST["diskon"];


			$sql="UPDATE diskon_tbl SET
					keterangan_diskon= '" . $keterangan_diskon ."',
					kategori_diskon  = '" . $kategori_diskon ."',
					diskon           = '" . $diskon . "'
					WHERE id_diskon=" . $id_diskon;

			$query=$this->db->query($sql);

			redirect(base_url() . "Diskon");
		}

		function get_diskon(){
			$this->db->set('status', '1');
			$this->db->where('id_diskon', htmlentities($this->input->post('id_diskon'),ENT_QUOTES));
			$this->db->update('diskon_tbl');

			
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			// var_dump($data["laporan_penjualan"]);exit;
			redirect(base_url() . "Diskon");
		}

		function get_diskon_non(){
			$this->db->set('status', '0');
			$this->db->where('id_diskon', htmlentities($this->input->post('id_diskon'),ENT_QUOTES));
			$this->db->update('diskon_tbl');

			
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			// var_dump($data["laporan_penjualan"]);exit;
			redirect(base_url() . "Diskon");

		}
	}