<?php
	
	class Menu extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model("Productmodel");
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('Usermodel');
		}

		function index(){
			$data["content_page"]="menu";
			$data["content_product"]=$this->Productmodel->getMenu();
			$data["content_detail"]=$this->Productmodel->getProduct();
			$data["content_producttt"]=$this->Productmodel->getProduct();
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			$data["get_user"]=$this->Productmodel->get_username();
			$this->load->view("index",$data);
		}

		function Detail($id_kategori){
			$data["content_page"]="menu";
			$data["content_producttt"]=$this->Productmodel->getdetailMenu($id_kategori);
			$data["content_productt"]=$this->Productmodel->getCategoridetail($id_kategori);
			$data["content_product"]=$this->Productmodel->getMenu();
			$data["content_detail"]=$this->Productmodel->getProduct();
			// $data["diskon_menu"]=$this->Productmodel->getDiskon();
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			$data["get_user"]=$this->Productmodel->get_username();
			$this->load->view("index",$data);
		}

		///////////////////////////////// START ADD TO CART //////////////////////////////////////////

		function tambah(){
			$product=$this->Productmodel->get_addcart($this->input->post('id'));

			if(!$this->session->has_userdata('username')){
			$harga_product = $product->harga_product;
			$diskon=0;
			
		}else{
			$harga_product=  $product->harga_product-$this->input->post('diskon');
			$diskon=$this->input->post('diskon');
		}
		// echo $diskon; exit;
			
			$ini = array(
					'id'         => $this->input->post('id'),
					'qty'        => $this->input->post('qty'),
					// 'price'      => $this->input->post('harga_product'),
					'name'       => $this->input->post('nama_product'),
					// 'img'        => $this->input->post('gambar_product'),
					'price'      => $harga_product,
					'diskon'     => $this->input->post('diskon'),
					'img'        => $product->gambar_product,
 					'status'     => $this->input->post('status_pengiriman'),
					'keterangan' => $this->input->post('keterangan_pengiriman'),
					'jam'        => $this->input->post('jam_pengiriman'),
					'alamat'     => $this->input->post('alamat_pengiriman'),
			); 
			$this->cart->insert($ini);
			// var_dump($data);exit;
			redirect('Menu');
		}

		///////////////////////////////// END ADD TO CART //////////////////////////////////////////


		function data_belanja(){
			$data["content_page"]="shopping-cart";
			$data["content_detail"]=$this->Productmodel->getProduct();
			$data["content_product"]=$this->Productmodel->getMenu();
			$data["content_kecamatan"]=$this->Usermodel->get_ongkir_tbl();
			$data["content_kelurahan"]=$this->Usermodel->get_kelurahan();
			$this->load->view("index",$data);
		}

		///////////////////////////////// START HAPUS TO CART //////////////////////////////////////////

		function hapus($id){
			if($id=='all'){
				$this->cart->destroy();
			}
			$ini = array('rowid'=>$id,
						  'qty'=>0);
			$this->cart->update($ini);
			redirect('Menu/data_belanja');
		}

		///////////////////////////////// END ADD TO CART //////////////////////////////////////////

		///////////////////////////////// START UPDATE TO CART /////////////////////////////////////

		function ubah_cart(){
			$product=$this->Productmodel->get_addcart($_POST['product_id']);
			$cart_info = $_POST['cart'];
						
			foreach($cart_info as $id => $cart)
			{
				// if(!$this->session->has_userdata('username')){
				// $harga_product = $product->harga_product;
				
				// }else{
				// $harga_product=  $product->harga_product;
				// }
				
				$rowid = $cart['rowid'];
				// $price = $cart['price'];
				// $gambar = $cart['img'];
				$price = $product->harga_product;
				$gambar= $product->gambar_product;
				$amount= $price * $cart['qty'];
				$qty   = $cart['qty'];
				$diskon= $cart['diskon'];
				// echo $diskon; exit;
				$data  = array('rowid' => $rowid,
							   'price' => $price-$diskon,
							   'img'   => $gambar,
							   'amount'=> $amount,
							   'qty'   => $qty);

				$this->cart->update($data);
								
			}
			// var_dump($data);exit;

			redirect('Menu/data_belanja');
			}

		///////////////////////////////// END UPDATE TO CART /////////////////////////////////////

		///////////////////////////////// START SEARCH ENGINE ////////////////////////////////////// 

			function search(){
			$keyword = $this->input->post('search');
			$data['content_producttt'] = $this->Productmodel->Cari_data_produk($keyword);
			$data["content_page"]="menu";
			$data["content_product"]=$this->Productmodel->getMenu();
			$data["content_detail"]=$this->Productmodel->getProduct();
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			$data["get_user"]=$this->Productmodel->get_username();
			$this->load->view("index",$data);
		}

		///////////////////////////////// END SEARCH ENGINE //////////////////////////////////////


		function get_diskon_menu(){
			$this->db->set('status', '1');
			$this->db->where('id_diskon', htmlentities($this->input->post('id_diskon'),ENT_QUOTES));
			$this->db->update('diskon_tbl');

			
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			// var_dump($data["laporan_penjualan"]);exit;
			redirect(base_url() . "Diskon");
		}

		function get_diskon_non_menu(){
			$this->db->set('status', '0');
			$this->db->where('id_diskon', htmlentities($this->input->post('id_diskon'),ENT_QUOTES));
			$this->db->update('diskon_tbl');

			
			$data["laporan_diskon"]=$this->Productmodel->aktif_diskon();
			// var_dump($data["laporan_penjualan"]);exit;
			redirect(base_url() . "Diskon");

		}
	}