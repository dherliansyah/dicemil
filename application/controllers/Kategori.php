<?php
	
	class Kategori extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model("Productmodel");
			$upload["upload_path"]="./image/product/";
			$upload["allowed_types"]="gif|jpg|png|jpeg";
			$upload["max_size"]=10240;
			$this->load->library("upload",$upload);
			$this->load->library("session");
		}

		function index(){
			$data["content_page"]="admin/kategori";
			$data["product_data"]=$this->Productmodel->getKategori();
			$this->load->view("admin/admin_index",$data);
		}

		function addProduct(){
			$nama_kategori      = $_POST["nama_kategori"];
			$keterangan_kategori = $_POST["keterangan_kategori"];
			$gambar_kategori="";

			if($this->upload->do_upload("gambar_kategori")){
				$gambar_kategori=$this->upload->file_name;
			}

			$sql ="INSERT INTO kategori_tbl (nama_kategori,gambar_kategori,keterangan_kategori)
					VALUES('" . $nama_kategori . "','" . $gambar_kategori . "','" . $keterangan_kategori . "')";

			$query=$this->db->query($sql);

			redirect(base_url() . "Kategori");
		}

		function EditproductSubmit(){
			$id_kategori = $_POST["id_kategori"];
			$nama_kategori = $_POST["nama_kategori"];
			$keterangan_kategori = $_POST["keterangan_kategori"];
			$gambar = $_POST["gambar_old"];
			$gambar_old = "./image/product/" . $_POST["gambar_old"];

			if($this->upload->do_upload("gambar_produk")){
				$gambar=$this->upload->file_name;
				if(file_exists($gambar_old)){
					unlink($gambar_old);
				}
			}

			$sql="UPDATE kategori_tbl SET
					nama_kategori='" . $nama_kategori ."',
					keterangan_kategori = '" . $keterangan_kategori ."',
					gambar_kategori = '" . $gambar ."'
					WHERE id_kategori=" . $id_kategori;

			$query=$this->db->query($sql);

			redirect(base_url() . "Kategori");
		}

		function deleteSubmit($id_kategori){
			$gambar=$this->Productmodel->getgambarproductKategori($id_kategori);
			$gambar="./image/product/" . $gambar;

			if(file_exists($gambar)){
				unlink($gambar);
			}

			$sql="DELETE FROM kategori_tbl WHERE id_kategori =" . $id_kategori;
			$query=$this->db->query($sql);
			redirect(base_url() . "Kategori");
		}
	}