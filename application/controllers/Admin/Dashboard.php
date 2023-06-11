<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
		$this->load->database(); // Memuat library database


    }

	
    public function index() {
        // Middleware admin
        $this->adminmiddleware->restrict();
    
        // Mendapatkan data pengguna yang sedang login
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user($user_id);
    
        // Menampilkan jumlah pelanggan
        $this->load->model('User_model');
        $role = 2;
        $jumlahuser = $this->User_model->getRoleUserCount($role);
    
        // Menampilkan jumlah produk dan data produk
        $this->load->model('Product_model');
        $jumlahProduk = $this->Product_model->getProductCount();
        $products = $this->Product_model->getAllProducts();
    
        // Menampilkan jumlah order
        $this->load->model('Order_model');
        $jumlahOrder = $this->Order_model->getProductCount();
    
        // Data untuk dikirim ke view
        $datadashboard = array(
            'user' => $user,
            'jumlahuser' => $jumlahuser,
            'jumlahProduk' => $jumlahProduk,
            'products' => $products,
            'jumlahOrder' => $jumlahOrder
        );
    
        $this->load->view('Admin/partials/header');
        $this->load->view('Admin/partials/navbar', $datadashboard);
        $this->load->view('Admin/dashboard', $datadashboard);
        $this->load->view('Admin/partials/footer');
    }
    


	
    public function getUser($user_id) {
        // Panggil metode get_user pada model User_model
        $user = $this->User_model->get_user($user_id);

        if ($user) {
            // Jika pengguna ditemukan, tampilkan data pengguna
            echo "User ID: " . $user->id . "<br>";
            echo "Username: " . $user->username . "<br>";
            echo "Email: " . $user->email . "<br>";
            // ...
        } else {
            // Jika pengguna tidak ditemukan, tampilkan pesan error atau lakukan tindakan yang sesuai
            echo "User not found";
        }
    }
	
	
}
