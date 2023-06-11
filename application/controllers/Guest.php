<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function index()
	{
		//mengambil data kategori
        $categories = $this->Category_model->getAllCategory();
    
        // Menampilkan jumlah produk dan data produk
        $this->load->model('Product_model');
        $jumlahProduk = $this->Product_model->getProductCount();
        $products = $this->Product_model->getAllProducts();
        $bestProducts = $this->Product_model->getBestProduct();
        $bestSelling = $this->Product_model->getBestSelling();

    

        // Data untuk dikirim ke view
        $data = array(
            'jumlahProduk' => $jumlahProduk,
            'products' => $products,
            'bestProducts' => $bestProducts,
            'bestSelling' => $bestSelling,
            'categories' => $categories
        );

		$this->load->view('Guest/partials/header');
		$this->load->view('Guest/partials/navbar');
        $this->load->view('Guest/home', $data);
		$this->load->view('Guest/partials/footer');
	}

}
