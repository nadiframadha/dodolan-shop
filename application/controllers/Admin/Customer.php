<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	
	public function index()
	{
		$this->adminmiddleware->restrict();
    
        // Mendapatkan data pengguna yang sedang login
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user($user_id);


		$this->load->model('User_model');
		$role = 2;
		//get jumlah user customer
        $jumlahCust = $this->User_model->getRoleUserCount($role);

		//get all user customer
		$customer = $this->User_model->getAllCustomer($role);

		$data = array(
			'jumlahCust' => $jumlahCust,
			'customer' => $customer,
			'user' => $user
        );

		$this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar', $data);
		$this->load->view('Admin/customer/index', $data);
		$this->load->view('Admin/partials/footer');
	}

    public function create()
    {
		$this->load->view('Admin/partials/header');
		$this->load->view('Admin/customer/create');
		$this->load->view('Admin/partials/footer');
       
    }

    public function edit($customer_id) {
		// Middleware admin
		$this->adminmiddleware->restrict();
	
		// Mendapatkan data pengguna yang sedang login
		// $this->load->model('User_model');
		// $user_id = $this->session->userdata('user_id');
		// $user = $this->User_model->get_user($user_id);
	
		// Mendapatkan data product berdasarkan ID
		$this->load->model('User_model');
		$customer = $this->User_model->getUserById($customer_id);
	
		
	
		if ($customer) {
			// $data['user'] = $user;
			$data['customer'] = $customer;
	
			$this->load->view('Admin/partials/header');
			$this->load->view('Admin/customer/edit', $data);
			$this->load->view('Admin/partials/footer');
		} else {
			echo "customer not found";
		}
	}
	

	public function update() {
		// Memeriksa apakah metode yang digunakan adalah metode POST
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Mengambil data yang dikirimkan melalui formulir
			$customer_id = $this->input->post('customer_id');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$phone = $this->input->post('phone');
			$alamat = $this->input->post('alamat');
			$deskripsi = $this->input->post('deskripsi');
			$image = $this->input->post('image');
	
			$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'alamat' => $alamat,
				'deskripsi' => $deskripsi,
				'image' => $image 
			);
	
			// Lakukan validasi data jika diperlukan
			$this->form_validation->set_rules('name', 'name', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('phone', 'phone', 'required');
			$this->form_validation->set_rules('alamat', 'alamat', 'required');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
			$this->form_validation->set_rules('image', 'image');
	
			$this->User_model->updateUser($customer_id, $data); // Menyertakan $product_id sebagai argumen pertama
	
			// Periksa apakah pembaruan berhasil
			if ($this->db->affected_rows() > 0) {
				// Jika pembaruan berhasil, tampilkan pesan sukses atau redirect ke halaman lain
				redirect('admin-customer');
			} else {
				redirect('admin-edit-customer/'. $customer_id);
			}
		} else {
			// Jika metode yang digunakan bukan metode POST, tampilkan halaman kosong atau redirect ke halaman lain
			// ...
		}
	}

	public function delete($customer_id) 
	{
		// Memuat model 'Product_model'
		$this->load->model('User_model');
	
		// Memanggil metode 'deleteProduct' pada model dengan ID produk yang diterima
		$this->User_model->deleteProduct($customer_id);
	
		// Redirect kembali ke halaman daftar produk setelah penghapusan
		redirect('admin-customer');
	}
	
	
	
}
