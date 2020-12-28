<?php

	class Penjualan extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model("Productmodel");
			$this->load->library("session");
		}

		function index(){
			$data["content_page"]="admin/penjualan";
			$data["laporan_penjualan"]=$this->Productmodel->penjualan();
			// var_dump($data["laporan_penjualan"]);exit;
			$this->load->view("admin/admin_index",$data);
		}

		function konfirmasi_pembayaran(){
			$this->db->set('status', 'sudah dikonfirmasi');
			$this->db->where('order_id', htmlentities($this->input->post('order_id'),ENT_QUOTES));
			$this->db->update('order_tbl');

			$data["content_page"]="admin/penjualan";
			$data["laporan_penjualan"]=$this->Productmodel->penjualan();
			// var_dump($data["laporan_penjualan"]);exit;
			$this->load->view("admin/admin_index",$data);
		}

		function laporan_cetak(){
    		$np = $this->input->post('namaproduk');
    		$dt = $this->input->post('daritgl');
    		$st = $this->input->post('sampaitgl');
    		$data['cetak_laporan']=$this->Productmodel->cetak_laporan($np,$dt,$st);
    		$this->load->view('admin/cetak_laporan',$data);
    }
	}