<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
		$this->load->database(); // Memuat library database
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->adminmiddleware->restrict();

		// Mendapatkan data pengguna yang sedang login
		$user_id = $this->session->userdata('user_id');
		$user = $this->User_model->get_user($user_id);

		$this->load->model('Product_model');
		$jumlahProduk = $this->Product_model->getProductCount();
		$products = $this->Product_model->getAllProducts();

		$data = array(
			'products' => $products,
			'jumlahProduk' => $jumlahProduk,
			'user' => $user
		);

		$this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar', $data);
		$this->load->view('Admin/product/index', $data);
		$this->load->view('Admin/partials/footer');
	}

	public function create()
	{
		$this->load->model('Category_model');
		$category = $this->Category_model->getAllCategory();

		$data = array(
			'category' => $category
		);
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('description', 'desciption', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');
		$this->form_validation->set_rules('stock', 'stock', 'required');
		$this->form_validation->set_rules('image', 'image', 'required');
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('rating', 'rating');
		$this->form_validation->set_rules('best_seling', 'best_seling');
		$this->form_validation->set_rules('produk_unggulan', 'produk_unggulan');



		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Admin/partials/header');
			$this->load->view('Admin/product/create', $data);
			$this->load->view('Admin/partials/footer');
		} else {
			// Ambil data dari formulir
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$stock = $this->input->post('stock');
			$color = $this->input->post('color');
			$image = $this->input->post('image');
			$category = $this->input->post('category');
			$rating = $this->input->post('rating');
			$best_selling = $this->input->post('best_selling');
			$produk_unggulan = $this->input->post('produk_unggulan');




			// Lakukan proses penyimpanan data ke database
			$data = array(
				'item_name' => $name,
				'description' => $description,
				'price' => $price,
				'stock' => $stock,
				'image' => $image,
				'color' => $color,
				'category_id' => $category,
				'rating' => $rating,
				'best_selling' => $best_selling,
				'produk_unggulan' => $produk_unggulan
			);

			$this->db->insert('products', $data);

			// Redirect ke halaman login atau halaman lain yang diinginkan
			redirect('admin-product');
		}
	}

	public function edit($product_id)
	{
		// Middleware admin
		$this->adminmiddleware->restrict();

		// Mendapatkan data pengguna yang sedang login
		// $this->load->model('User_model');
		// $user_id = $this->session->userdata('user_id');
		// $user = $this->User_model->get_user($user_id);

		// Mendapatkan data product berdasarkan ID
		$this->load->model('Product_model');
		$product = $this->Product_model->getProductById($product_id);

		// Mendapatkan data category
		$this->load->model('Category_model');
		$categories = $this->Category_model->getAllCategory();

		if ($product) {
			// $data['user'] = $user;
			$data['product'] = $product;
			$data['categories'] = $categories;

			$this->load->view('Admin/partials/header');
			$this->load->view('Admin/product/edit', $data);
			$this->load->view('Admin/partials/footer');
		} else {
			echo "product not found";
		}
	}


	public function update()
	{
		// Memeriksa apakah metode yang digunakan adalah metode POST
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Mengambil data yang dikirimkan melalui formulir
			$product_id = $this->input->post('product_id');
			$name = $this->input->post('name');
			$description = $this->input->post('description');
			$price = $this->input->post('price');
			$stock = $this->input->post('stock');
			$color = $this->input->post('color');
			$image = $this->input->post('image');
			$category = $this->input->post('category');
			$rating = $this->input->post('rating');
			$best_selling = $this->input->post('best_selling');
			$produk_unggulan = $this->input->post('produk_unggulan');

			$product = $this->Product_model->getProductById($product_id);

			if ($image == null){

				$image =  $product->image;
				$data = array(
					'item_name' => $name,
					'description' => $description,
					'price' => $price,
					'stock' => $stock,
					'color' => $color,
					'image' => $image,
					'category_id' => $category,
					'rating' => $rating,
					'best_selling' => $best_selling,
					'produk_unggulan' => $produk_unggulan
				);
			} else {
				$data = array(
					'item_name' => $name,
					'description' => $description,
					'price' => $price,
					'stock' => $stock,
					'color' => $color,
					'image' => $image,
					'category_id' => $category,
					'rating' => $rating,
					'best_selling' => $best_selling,
					'produk_unggulan' => $produk_unggulan
				);
			}
			// Lakukan validasi data jika diperlukan
			$this->form_validation->set_rules('name', 'Product Name', 'required');
			$this->form_validation->set_rules('description', 'Product Description', 'required');
			$this->form_validation->set_rules('price', 'Product Price', 'required');
			$this->form_validation->set_rules('stock', 'Product Stock', 'required');
			$this->form_validation->set_rules('image', 'Product image', 'required');
			$this->form_validation->set_rules('category', 'Product Category', 'required');
			$this->form_validation->set_rules('rating', 'rating');
			$this->form_validation->set_rules('best_seling', 'best_seling');
			$this->form_validation->set_rules('produk_unggulan', 'produk_unggulan');

			// Memperbarui data produk di database
			// Misalnya, menggunakan model 'Product_model'
			$this->load->model('Product_model');
			$this->Product_model->updateProduct($product_id, $data); // Menyertakan $product_id sebagai argumen pertama

			// Periksa apakah pembaruan berhasil
			if ($this->db->affected_rows() > 0) {
				// Jika pembaruan berhasil, tampilkan pesan sukses atau redirect ke halaman lain
				redirect('admin-product');
			} else {
				redirect('admin-edit-product/' . $product_id);
			}
		} else {
			// Jika metode yang digunakan bukan metode POST, tampilkan halaman kosong atau redirect ke halaman lain
			// ...
		}
	}

	public function delete($product_id)
	{
		// Memuat model 'Product_model'
		$this->load->model('Product_model');

		// Memanggil metode 'deleteProduct' pada model dengan ID produk yang diterima
		$this->Product_model->deleteProduct($product_id);

		// Redirect kembali ke halaman daftar produk setelah penghapusan
		redirect('admin-product');
	}
}
