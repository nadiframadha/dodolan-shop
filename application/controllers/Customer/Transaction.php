<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function index()
	{
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user($user_id);
    
        // Menampilkan jumlah produk dan data produk
        $this->load->model('Product_model');
        $jumlahProduk = $this->Product_model->getProductCount();
        $products = $this->Product_model->getAllProducts();
    
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
        );

		$this->load->view('Customer/partials/header', $data);
		$this->load->view('Customer/partials/navbar');
        $this->load->view('Customer/transaction/checkout', $data);
		$this->load->view('Customer/partials/footer');

	}

    public function payment()
    {
        $this->load->view('Customer/partials/header');
		$this->load->view('Customer/partials/navbar');
        $this->load->view('Customer/transaction/payment');
		$this->load->view('Customer/partials/footer');
    }

    public function emptyChart()
    {
        $this->load->view('Customer/partials/header');
		$this->load->view('Customer/partials/navbar');
        $this->load->view('Customer/transaction/empty-chart');
		$this->load->view('Customer/partials/footer');
    }

    public function myChart()
    {
        $this->load->view('Customer/partials/header');
		$this->load->view('Customer/partials/navbar');
        $this->load->view('Customer/transaction/mychart');
		$this->load->view('Customer/partials/footer');
    }
}
