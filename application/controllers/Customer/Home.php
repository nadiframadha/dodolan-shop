<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            $user = $this->User_model->get_user($user_id);
            
            //mengambil data kategori
            $categories = $this->Category_model->getAllCategory();
        
            // Menampilkan jumlah produk dan data produk
            $this->load->model('Product_model');
            $jumlahProduk = $this->Product_model->getProductCount();
            $products = $this->Product_model->getAllProducts();
            $bestProducts = $this->Product_model->getBestProduct();
            $bestSelling = $this->Product_model->getBestSelling();

        
            // Menampilkan jumlah order
            $this->load->model('Order_model');
            $jumlahOrder = $this->Order_model->getProductCount();
        
            //menampilkan item chart
            $cart = $this->Cart_model->getCartByUser($user_id);
            //total item price
            $totalItemPrice = $this->Cart_model->getTotalItemPriceByUser($user_id);

            //total item dalam cart
            $jmlItem = $this->Cart_model->getItemCartCount($user_id);

            // Data untuk dikirim ke view
            $data = array(
                'user' => $user,
                'jumlahProduk' => $jumlahProduk,
                'products' => $products,
                'jumlahOrder' => $jumlahOrder,
                'cart' => $cart,
                'totalItemPrice' => $totalItemPrice,
                'jmlItem' => $jmlItem,
                'bestProducts' => $bestProducts,
                'bestSelling' => $bestSelling,
                'categories' => $categories
            );

            $this->load->view('Customer/partials/header', $data);
            $this->load->view('Customer/partials/navbar');
            $this->load->view('Customer/home', $data);
            $this->load->view('Customer/partials/footer');

        } else {
            redirect('login');
        }
    }
}
