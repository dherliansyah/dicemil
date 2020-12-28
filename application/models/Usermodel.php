<?php

	Class Usermodel extends CI_Model{
		function __construct(){
			parent:: __construct();
			$this->load->database();
		}

		////////////////////////////// START QUERY REGISTRASI //////////////////////// 
		function save(){
			$data = array(
				"nama" =>htmlentities($this->input->post('nama'),ENT_QUOTES),
				"email" =>htmlentities($this->input->post('email'),ENT_QUOTES),
				"no_telp" =>htmlentities($this->input->post('telepon'),ENT_QUOTES),
				"alamat" =>htmlentities($this->input->post('alamat'),ENT_QUOTES),
				"gender" =>htmlentities($this->input->post('gender'),ENT_QUOTES),
				"tanggal_lahir" =>htmlentities($this->input->post('tanggal_lahir'),ENT_QUOTES),
				"username" =>htmlentities($this->input->post('username'),ENT_QUOTES),
				"password" =>htmlentities($this->input->post('password'),ENT_QUOTES),
				"createdate" => date('y-m-d H:i:s' ),
			);

			$this->db->insert('member_tbl',$data);
		}
		////////////////////////////// END QUERY REGISTRASI ////////////////////////

		function simpan_data_pesanan($data){
			$this->db->insert('order_tbl',$data);
			$id_data = $this->db->insert_id();
			return(isset($id_data)) ? $id_data : FALSE;
		}

		function simpan_detail_pesanan($data){
			$this->db->insert('order_detail_tbl',$data);
		}

		function get_ongkir_tbl(){
			$sql="SELECT DISTINCT kecamatan FROM ongkir_tbl ";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function get_kelurahan(){
			$sql="SELECT * FROM ongkir_tbl ";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function data_kecamatan($kecamatan){
			$sql="SELECT kelurahan,id_ongkir FROM ongkir_tbl WHERE kecamatan='" . $kecamatan . "'";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function data_ongkir($ongkir){
			$sql="SELECT harga_ongkir FROM ongkir_tbl WHERE kelurahan='" . $ongkir . "' ";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function invoice(){

			$session = $this->session->userdata('username');
			$this->db->select('*');
			$this->db->from('order_tbl');
			if($session=NULL){
			$this->db->where('customer_username',$session);
			}
			return $this->db->get()->result();
		}

		function Cetak_invoice($order_id){

			$session = $this->session->userdata('username');

			$this->db->select('*');
			$this->db->from('order_tbl');
			$this->db->join('order_detail_tbl', 'order_detail_tbl.order_id=order_tbl.order_id');
			$this->db->join('product_tbl', 'product_tbl.nama_product=order_detail_tbl.produk');
			if($session!=NULL){
			$this->db->where('customer_username',$session);
			}
			$this->db->where('order_tbl.order_id',$order_id);
			return $this->db->get()->result_array();
		}

		function Cetak_invoice1($order_id){

			$session = $this->session->userdata('username');

			$this->db->select('*');
			$this->db->from('order_tbl');
			$this->db->join('order_detail_tbl', 'order_detail_tbl.order_id=order_tbl.order_id');
			$this->db->join('product_tbl', 'product_tbl.nama_product=order_detail_tbl.produk');
			if($session!=NULL){
			$this->db->where('customer_username',$session);
			}
			$this->db->where('order_tbl.order_id',$order_id);
			return $this->db->get()->result();
		}

		function validation_pembayaran($simpan){
			$this->load->library('form_validation');

			if($simpan == 'save_pembayaran')

				$this->form_validation->set_rules('nama_pengirim','Nama Pengirim/ Pemilik No Rekening','trim|required|min_length[4]|max_length[22]');
				$this->form_validation->set_rules('no_invoice','Nomor Invoice','trim|required|min_length[4]|max_length[22]');
				$this->form_validation->set_rules('jumlah_transfer','Jumlah Transper','trim|required|min_length[1]|max_length[13]');

				$this->form_validation->set_message('required','Mohon untuk mengisi form terlebih dahulu');
				$this->form_validation->set_message('numeric','Mohon diisi dengan angka Harus angka');

				if($this->form_validation->run())
					return TRUE;
				else
					// var_dump($simpan);exit;
					return FALSE;
				
		}
		function save_pembayaran($gambar){
			$data = array(
				"nama_pengirim"    =>htmlentities($this->input->post('nama_pengirim'),ENT_QUOTES),
				"nomor_invoice"    =>htmlentities($this->input->post('no_invoice'),ENT_QUOTES),
				"jumlah_transfer"  =>htmlentities($this->input->post('jumlah_transfer'),ENT_QUOTES),
				"order_id"         =>htmlentities($this->input->post('order_id'),ENT_QUOTES),
				"gambar_transfer"  =>$gambar,
				"tanggal_upload"   => date('y-m-d'),
			);

			$this->db->insert('pembayaran_tbl',$data);

			$this->db->set('status', 'sudah transfer');
			$this->db->where('order_id', htmlentities($this->input->post('order_id'),ENT_QUOTES));
			$this->db->update('order_tbl');
		}
	}