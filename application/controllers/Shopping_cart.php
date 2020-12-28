<?php

	class Shopping_cart extends CI_Controller{
		function __construct(){
			parent:: __construct();
			$this->load->model('Productmodel');
			$this->load->model('Usermodel');
			$this->load->library('form_validation');
			$this->load->library('session');
			$this->load->model('Usermodel');
		}

		function index(){
			$data["content_page"]="shopping-cart";
			$data["content_detail"]=$this->Productmodel->getProduct();
			$data["content_product"]=$this->Productmodel->getMenu();
			$this->load->view("index",$data);
		}


		function simpan_pesanan(){
			if(!$this->session->has_userdata('username')){
				$nama_penerima    = $this->input->post('nama_penerima');
				$no_telp          = $this->input->post('no_telp');
				$data_order = array('order_date'        => date('Y-m-d'),
									'customer_username' => $nama_penerima,
									'total'             => $this->input->post('total'),
									'status'			=> 'Belum Transfer',
									'no_rekening'       => $this->input->post('optionsRadios'));
								// var_dump($nama_penerima);exit;
				$id_order   = $this->Usermodel->simpan_data_pesanan($data_order);

				if($cart    = $this->cart->contents()){
					foreach($cart as $item){
							if($item['status'] == 'delivery'){
								$alamat           = $this->input->post('alamat');
								$kecamatan        = $this->input->post('kecamatan');
								$kelurahan        = $this->input->post('kelurahan');
								$harga_ongkir     = $this->input->post('ongkos_kirim');
							}else{
								$alamat           = "-";
								$kecamatan        = "-";
								$kelurahan        = "-";
								$harga_ongkir     = "-";
							}
	
						if($item['keterangan'] == 'sekarang'){
							$jam= "";
							// date('H:i:s', strtotime('+5 hours'));
							// var_dump($jam);exit;
						}else{
							$jam= $item['jam'];
						}
						$data_detail    = array('order_id'            => $id_order,
											'produk'                  => $item['name'],
											'status_pengiriman'       => $item['status'],
											'keterangan_pengiriman'   => $item['keterangan'],
											'jam_pengiriman'          => $jam,
											'qty'                     => $item['qty'],
											'jumlah_harga'            => $item['subtotal']-$item['diskon'],
											'no_telp'                 => $no_telp,
											'alamat'                  => $alamat,
											'kecamatan'               => $kecamatan,
											'kelurahan'               => $kelurahan,
											'ongkos_kirim'            => $harga_ongkir);

						$simpan         = $this->Usermodel->simpan_detail_pesanan($data_detail);
					}
				}
			}else{
				$no_telp          = $this->input->post('no_telp');
				$alamat           = $this->input->post('alamat');
				$session          = $this->session->userdata('username');
				$kecamatan        = $this->input->post('kecamatan');
				$kelurahan        = $this->input->post('kelurahan');
				$harga_ongkir     = $this->input->post('ongkos_kirim');
				$data_order = array('order_date'    => date('Y-m-d'),
								'total'             => $this->input->post('total'),
								'status'			=> 'Belum Transfer',
								'no_rekening'       => $this->input->post('optionsRadios'),
								'customer_username' => $session);
				$id_order   = $this->Usermodel->simpan_data_pesanan($data_order);
				if($cart    = $this->cart->contents()){
					foreach($cart as $item){
						if($item['status'] == 'delivery'){
								$alamat           = $this->input->post('alamat');
								$kecamatan        = $this->input->post('kecamatan');
								$kelurahan        = $this->input->post('kelurahan');
								$harga_ongkir     = $this->input->post('ongkos_kirim');
							}else{
								$alamat           = "-";
								$kecamatan        = "-";
								$kelurahan        = "-";
								$harga_ongkir     = "-";
							}
			
						if($item['keterangan'] == 'sekarang'){
							$jam= "";
							// date('H:i:s', strtotime('+5 hours'));
							// var_dump($jam);exit;
						}else{
							$jam= $item['jam'];
						}
						$data_detail    = array('order_id' => $id_order,
											'produk'                  => $item['name'],
											'status_pengiriman'       => $item['status'],
											'keterangan_pengiriman'   => $item['keterangan'],
											'jam_pengiriman'          => $jam,
											'qty'                     => $item['qty'],
											'jumlah_harga'            => $this->input->post('total_harga'),
											'no_telp'                 => $no_telp,
											'alamat'                  => $alamat,
											'kecamatan'               => $kecamatan,
											'kelurahan'               => $kelurahan,
											'diskon'                  => $item['diskon'],
											'ongkos_kirim'            => $harga_ongkir);


						$simpan         = $this->Usermodel->simpan_detail_pesanan($data_detail);
				}
				}	
			} 
			
			$this->cart->destroy();
			$data["content_page"]="riwayat-transaksi";
			$data["content_product"]=$this->Productmodel->getMenu();
			$data["content_detail"]=$this->Productmodel->getProduct();
			$data["content_producttt"]=$this->Productmodel->getProduct();
			$this->load->view('index',$data);
			redirect('Shopping_cart/transaksi_riwayat');
		}

		function get_kecamatan($kecamatan){

			$kecamatan=$this->Usermodel->data_kecamatan($kecamatan);
			// var_dump($data['content_kota']);exit;
			$this->output->set_content_type('application/json')->set_output(json_encode($kecamatan));
		}

		function get_ongkir($ongkir){
			$ongkir=str_replace("%20"," ",$ongkir);
			// var_dump($ongkir);exit;
			$ongkir=$this->Usermodel->data_ongkir($ongkir);
			$this->output->set_content_type('application/json')->set_output(json_encode($ongkir));
		}

		function transaksi_riwayat(){
			$data["data_pembayaran"]=$this->Usermodel->invoice();
			$data["content_page"]="riwayat-transaksi";
			$data["content_product"]=$this->Productmodel->getMenu();
			// var_dump($data["data_pembayaran"]);exit;
			$this->load->view('index',$data);
		}

		function cetak_invoice($order_id){
			$data['data_pembayaran'] = $this->Usermodel->Cetak_invoice($order_id);
			$data['data_pembayaran1'] = $this->Usermodel->Cetak_invoice1($order_id);
			// var_dump($data["data_pembayaran"]);exit;
			$this->load->view('cetak_invoice',$data);
		}

		function Uploadstruk(){
			$config['upload_path']    = './image/struk_pembayaran';
			$config['allowed_types']  = 'gif|jpg|png';
			$config['max_size']       = 40240;

			$this->load->library('upload',$config);

			$this->upload->initialize($config);
			$this->upload->do_upload("input_gambar");
			$data = $this->upload->data();

			$gambar = $data['file_name'];

			if($simpan=$this->input->post('submit')){
				
				if($this->Usermodel->validation_pembayaran("save_pembayaran")){
					// var_dump($simpan);exit;
					$this->Usermodel->save_pembayaran($gambar);
					redirect(base_url() .'Shopping_cart/transaksi_riwayat');
				}
				$data["content_page"]="riwayat-transaksi";
				$data["data_pembayaran"]=$this->Usermodel->invoice();
				$this->load->view('index',$data);
			}

		}
	}