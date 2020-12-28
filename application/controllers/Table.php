<?php

	class Table extends CI_Controller{
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
			$data["content_page"]="admin/table";
			$data["product_data"]=$this->Productmodel->getProduct();
			$data["product_kategori"]=$this->Productmodel->getProductKategori();
			$this->load->view("admin/admin_index",$data);
		}

		function addProduct(){
			$id_kategori      = $_POST["id_kategori"];
			$id_diskon        = $_POST["id_diskon"];
			$nama_produk      = $_POST["nama_produk"];
			$deskripsi_produk = $_POST["deskripsi_produk"];
			$harga_produk     = $_POST["harga_produk"];
			$gambar_produk="";

			if($this->upload->do_upload("gambar_produk")){
				$gambar_produk=$this->upload->file_name;
			}

			$sql ="INSERT INTO product_tbl (id_diskon,id_kategori,nama_product,gambar_product,description_product,harga_product)
					VALUES(" . $id_diskon . "," . $id_kategori .",'". $nama_produk ."','" . $gambar_produk . "','" . $deskripsi_produk ."'," . $harga_produk ." )";

			$query=$this->db->query($sql);

			redirect(base_url() . "Table");
		}

		function EditproductSubmit(){
			$id_diskon   = $_POST["id_diskon"];
			$id_kategori = $_POST["id_kategori"];
			$id_produk = $_POST["id_produk"];
			$nama_produk = $_POST["nama_produk"];
			$deskripsi_produk = $_POST["deskripsi_produk"];
			$harga_produk = $_POST["harga_produk"];
			$gambar = $_POST["gambar_old"];
			$gambar_old = "./image/product/" . $_POST["gambar_old"];

			if($this->upload->do_upload("gambar_produk")){
				$gambar=$this->upload->file_name;
				if(file_exists($gambar_old)){
					unlink($gambar_old);
				}
			}

			$sql="UPDATE product_tbl SET
					id_diskon=" . $id_diskon . ",
					id_kategori=" . $id_kategori . ",
					nama_product='" . $nama_produk ."',
					description_product = '" . $deskripsi_produk ."',
					harga_product = '" . $harga_produk ."',
					gambar_product = '" . $gambar ."'
					WHERE id_product=" . $id_produk;

			$query=$this->db->query($sql);

			redirect(base_url() . "Table");
		}

		function deleteSubmit($id_product){
			$gambar=$this->Productmodel->getgambarProduct($id_product);
			$gambar="./image/product/" . $gambar;

			if(file_exists($gambar)){
				unlink($gambar);
			}

			$sql="DELETE FROM product_tbl WHERE id_product =" . $id_product;
			$query=$this->db->query($sql);
			redirect(base_url() . "Table");
		}

		function send($id_product){

			$send_email=$this->Productmodel->getProductsend($id_product);
			$send_user=$this->Productmodel->send_user();

        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dikiherliansyah123@gmail.com';
        $mail->Password = 'gvjlmnvvwdgivvfm';
        $mail->SMTPSecure = 'ssl';
        $mail->Port     = 465;
        
        $mail->setFrom('dikiherliansyah123@gmail.com', 'Diki Herliansyah');
        $mail->addReplyTo('dikiherliansyah123@gmail.com', 'Diki Herliansyah');
        
        // Add a recipient
        foreach($send_user as $row){
        $mail->addAddress($row['email']);
    	}
        
        
        // Email subject
        $mail->Subject = 'Produk Baru - Dicemil';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "<h3> Ada Produk Baro Lho Boleh, Cek SEkarang Juga!!</h3><br>
        				Nama Produk : ". $send_email->nama_product ." <br>
        				Harga       : " . $send_email->harga_product . " <br>
        				Atau <a href='http://localhost/dicemil/Menu/Detail/3'> Klik Disini</a> ";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            redirect(base_url() . "Table");
        }
    }


	}