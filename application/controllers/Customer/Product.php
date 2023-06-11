<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function index()
	{
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            $user = $this->User_model->get_user($user_id);
        
            // Menampilkan jumlah produk dan data produk
            $this->load->model('Product_model');
            $jumlahProduk = $this->Product_model->getProductCount();
            $products = $this->Product_model->getAllProducts();

            $category = $this->Category_model->getAllCategory();
        
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
                'category' => $category
            );
            $this->load->view('Customer/partials/header', $data);
            $this->load->view('Customer/partials/navbar');
            $this->load->view('Customer/product/all-product', $data);
            $this->load->view('Customer/partials/footer');

        } else{
            redirect('login');
        }
    }

    public function detailProduct($id_product)
    {
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            $user = $this->User_model->get_user($user_id);
        
            // Menampilkan jumlah produk dan data produk
            $this->load->model('Product_model');
            $jumlahProduk = $this->Product_model->getProductCount();
            $products = $this->Product_model->getAllProducts();
            $detailProducts = $this->Product_model->detailProduct($id_product);

        
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
                'detailProducts' => $detailProducts
            );
            $this->load->view('Customer/partials/header', $data);
            $this->load->view('Customer/partials/navbar');
            $this->load->view('Customer/product/detail-product');
            $this->load->view('Customer/partials/footer');
        } else {
            redirect('login');
        }
    }

    public function productByCategory($category_id)
	{
        if ($this->session->userdata('user_id')) {
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

            //product by kategori
            $ProductByCategory = $this->Product_model->getProductByCategory($category_id);
            // var_dump($ProductByCategory);

            // Data untuk dikirim ke view
            $data = array(
                'user' => $user,
                'jumlahProduk' => $jumlahProduk,
                'products' => $products,
                'jumlahOrder' => $jumlahOrder,
                'cart' => $cart,
                'totalItemPrice' => $totalItemPrice,
                'jmlItem' => $jmlItem,
                'ProductByCategory' => $ProductByCategory
            );
            $this->load->view('Customer/partials/header', $data);
            $this->load->view('Customer/partials/navbar');
            $this->load->view('Customer/product/product-by-category', $data);
            $this->load->view('Customer/partials/footer');

        } else {
            redirect('login');
        }
    }

    

    public function filterProducts()
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

        // Mendapatkan inputan kategori_id dan rating dari form
        

        $category = $this->Category_model->getAllCategory();
        $kategori_ids = $this->input->post('kategori_id');
        $ratings = $this->input->post('rating');
        $stockOnly = $this->input->post('stock_only');
        

        // Mengatur nilai $stockOnly berdasarkan input checkbox
        if ($stockOnly == '1') {
            $stockOnly = true;
        } else {
            $stockOnly = false;
        }

        // Memanggil model untuk mendapatkan produk yang difilter
        $filteredProducts = $this->Product_model->filterProducts($kategori_ids, $ratings, $stockOnly);
        $data = array(
            'user' => $user,
            'jumlahProduk' => $jumlahProduk,
            'products' => $products,
            'jumlahOrder' => $jumlahOrder,
			'cart' => $cart,
			'totalItemPrice' => $totalItemPrice,
			'jmlItem' => $jmlItem,
            'category' => $category,
            'filteredProducts' => $filteredProducts,
        );

        $this->load->view('Customer/partials/header', $data);
        $this->load->view('Customer/partials/navbar');
        $this->load->view('Customer/product/filter-product', $data);
        $this->load->view('Customer/partials/footer');

        
    }

    public function searchProducts()
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

        // Mendapatkan inputan kategori_id dan rating dari form
        

        $category = $this->Category_model->getAllCategory();
        $kategori_ids = $this->input->post('kategori_id');
        $ratings = $this->input->post('rating');
        $stockOnly = $this->input->post('stock_only');

        $keyword = $this->input->get('keyword');
        

        // Mengatur nilai $stockOnly berdasarkan input checkbox
        if ($stockOnly == '1') {
            $stockOnly = true;
        } else {
            $stockOnly = false;
        }

        // Memanggil model untuk mendapatkan produk yang difilter
        $filteredProducts = $this->Product_model->filterProducts($kategori_ids, $ratings, $stockOnly);
        // Panggil model dan panggil fungsi pencarian dengan memberikan keyword
        $searchProduct = $this->Product_model->searchProducts($keyword);

        $data = array(
            'user' => $user,
            'jumlahProduk' => $jumlahProduk,
            'products' => $products,
            'jumlahOrder' => $jumlahOrder,
			'cart' => $cart,
			'totalItemPrice' => $totalItemPrice,
			'jmlItem' => $jmlItem,
            'category' => $category,
            'filterProducts' => $filteredProducts,
            'searchProduct' => $searchProduct
        );

        // Kirim data produk ke tampilan pencarian
        $this->load->view('Customer/partials/header', $data);
        $this->load->view('Customer/partials/navbar');
        $this->load->view('Customer/product/search-product', $data);
        $this->load->view('Customer/partials/footer');    }


}
