<?php

	class Productmodel extends CI_Model{
		function __construct(){
			parent:: __construct();
			$this->load->database();
		}

		function getProduct(){
			$sql="SELECT * FROM product_tbl " ;
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function getMenu(){
			$sql="SELECT * FROM kategori_tbl ORDER BY id_kategori ASC";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function getdetailMenu($id_kategori){
			$sql="SELECT * FROM product_tbl JOIN kategori_tbl ON product_tbl.id_kategori=kategori_tbl.id_kategori WHERE kategori_tbl.id_kategori=" . $id_kategori ;
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function getCategoridetail($id_kategori){
			$sql="SELECT * FROM product_tbl WHERE id_kategori=" . $id_kategori ;
			$query=$this->db->query($sql);
			return $query->result_array();

		}

		function getProductKategori(){
			$sql="SELECT * FROM kategori_tbl ORDER BY id_kategori ASC";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function getKategori(){
			$sql="SELECT * FROM kategori_tbl";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

		function getUltah(){
			$sql="SELECT * FROM member_tbl WHERE MONTH(tanggal_lahir)=MONTH(CURDATE()) AND DAY(tanggal_lahir)=DAY(CURDATE()) ";
			$query=$this->db->query($sql);
			return $query->result_array();
		}
///////////////////////////////////////////// Start Admin Diskon ///////////////////////////////////////////////// 

		function getDiskonAdmin(){
			$sql="SELECT * FROM diskon_tbl";
			$query=$this->db->query($sql);
			return $query->result_array();
		}

///////////////////////////////////////////// End Admin Diskon /////////////////////////////////////////////////


///////////////////////////////////// START DELETE DATA PRODUCT ADMIN //////////////////////////////////////////////// 
		function getgambarProduct($id_product=0){
			$result="";
				if($id_product>0){
					$sql="SELECT gambar_product FROM product_tbl WHERE id_product =" . $id_product ;
					$query = $this->db->query($sql);
					$rows=$query->row();
					$result=$rows->gambar_product; 
				}

				return $result;
		}
///////////////////////////////////// END DELETE DATA ////////////////////////////////////////////////

///////////////////////////////////// START DELETE DATA KATEGORI ADMIN //////////////////////////////////////////////// 
		function getgambarproductKategori($id_kategori=0){
			$result="";
				if($id_kategori>0){
					$sql="SELECT gambar_kategori FROM kategori_tbl WHERE id_kategori =" . $id_kategori ;
					$query = $this->db->query($sql);
					$rows=$query->row();
					$result=$rows->gambar_kategori; 
				}

				return $result;
		}
///////////////////////////////////// END DELETE DATA KATEGORI ////////////////////////////////////////////////

///////////////////////////////////// Start Login Admin ////////////////////////////////////////////////

		function checkLogin($username,$password){
			$sql="SELECT username,password FROM admin_tbl WHERE username ='" . $username ."' AND password = '" . $password ."' ";
			$query=$this->db->query($sql);

			return $query->num_rows();

		}

///////////////////////////////////// END Login Admin /////////////////////////////////////////////////

///////////////////////////////////// Start Login User ////////////////////////////////////////////////

		function LoginCheck($username,$password){
			$sql="SELECT username,password FROM member_tbl WHERE username ='" . $username ."' AND password = '" . $password ."' ";
			$query=$this->db->query($sql);
			return $query->num_rows();

		}

///////////////////////////////////// END Login User /////////////////////////////////////////////////

// ///////////////////////////////////// START getDiskon product ////////////////////////////////////////

// 		function getDiskon(){
// 			$sql="SELECT * FROM product_tbl WHERE diskon_product>0";
// 			$query=$this->db->query($sql);
// 			return $query->result_array();
// 		}

// ///////////////////////////////////// END getDiskon product //////////////////////////////////////////

///////////////////////////////////// START Cari _produk /////////////////////////////////////////////

		function Cari_data_produk($keyword){
			$sql=" SELECT * FROM product_tbl WHERE nama_product LIKE '%". $keyword ."%' ";
			// var_dump($sql);exit;
			$query=$this->db->query($sql);
			return $query->result_array();
		}

///////////////////////////////////// END Cari _produk ///////////////////////////////////////////////

//////////////////////////////////// START LAPORAN PENJUALAN ///////////////////////////////////////// 

		function penjualan(){
			$sql="SELECT * FROM order_tbl JOIN order_detail_tbl ON order_tbl.order_id=order_detail_tbl.order_id JOIN pembayaran_tbl ON pembayaran_tbl.order_id=order_tbl.order_id";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

//////////////////////////////////// END LAPORAN PENJUALAN /////////////////////////////////////////

/////////////////////////////////// START SHOPPING CART DENGAN DATABASE ///////////////////////////

		function get_addcart($id){
			$sql = "SELECT * FROM product_tbl WHERE id_product=" . $id;
			$query = $this->db->query($sql);
			return $query->row();
		}

/////////////////////////////////// END SHOPPING CART DENGAN DATABASE ///////////////////////////
		function aktif_diskon(){
			$sql= "SELECT * FROM diskon_tbl WHERE status=1";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		function get_username(){
			$user = $this->session->userdata('username');

			$sql="SELECT * FROM member_tbl WHERE username='" . $user . "'";

			$query = $this->db->query($sql);

			return $query->row();
		}

	////////////////// START SEND EMAIL /////////////////////////

		function getProductsend($id_product){
			$sql="SELECT * FROM product_tbl WHERE id_product= '" . $id_product . "' " ;
			$query=$this->db->query($sql);
			return $query->row();
		}

		function send_user(){
			$sql="SELECT * FROM member_tbl" ;
			$query=$this->db->query($sql);
			return $query->result_array();
		}

	////////////////// START SEND EMAIL /////////////////////////

		function cetak_laporan($np,$dt,$st){
			// $sql = "SELECT * FROM order_tbl JOIN order_detail_tbl ON order_tbl.order_id=order_detail_tbl.order_id WHERE (order_date BETWEEN '$dt' AND '$st') AND produk = '$np' ";

			$sql = "SELECT * FROM order_tbl JOIN order_detail_tbl ON order_tbl.order_id=order_detail_tbl.order_id ";

			if($np!="" || $dt!="" || $st!=""){
				$sql .= " WHERE ";
			}

			if($np!=""){
				$sql .= " order_detail_tbl.produk = '$np' ";
			}

			if($dt!=""){
				if($np!=""){
					$sql .= " AND ";
				}
				$sql .= " order_tbl.order_date >= '$dt' ";
			}

			if($st!=""){
				if($np!="" || $dt!=""){
					$sql .= " AND ";
				}
				$sql .= " order_tbl.order_date <= '$st' "; 
			}

			// echo $sql;exit;
			$query = $this->db->query($sql);
			return $query->result_array();
		}

	}