<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct() {
        parent::__construct();
		$this->load->helper('form');


    }
	
	public function index()
	{
		$this->adminmiddleware->restrict();
    
        // Mendapatkan data pengguna yang sedang login
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user($user_id);

		$this->load->model('Category_model');
        $jumlahCategory = $this->Category_model->getCategoryCount();
        $category = $this->Category_model->getAllCategory();

		$data = array(
            'category' => $category,
			'jumlahCategory' => $jumlahCategory,
			'user' => $user 
        );
		$this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar',$data);
		$this->load->view('Admin/category/index', $data);
		$this->load->view('Admin/partials/footer');
	}

    public function create()
    {
        $this->load->view('Admin/partials/header');
		$this->load->view('Admin/category/create');
		$this->load->view('Admin/partials/footer');
    }

	public function store()
	{
		$this->form_validation->set_rules('kategori', 'kategori', 'required');
		$this->form_validation->set_rules('image', 'image', 'required');
        
       

        if ($this->form_validation->run() == FALSE) {
           redirect('admin-create-category');
        } else {
            // Ambil data dari formulir
            $kategori = $this->input->post('kategori');
            $image = $this->input->post('image');
            



    
            // Lakukan proses penyimpanan data ke database
            $data = array(
                'category_name' => $kategori,
				'image' => $image
                		
            );

            $this->db->insert('categories', $data);
    
            // Redirect ke halaman login atau halaman lain yang diinginkan
            redirect('admin-category');
        }
	}

    public function edit($category_id) {
		// Middleware admin
		$this->adminmiddleware->restrict();
	
		// Mendapatkan data pengguna yang sedang login
		// $this->load->model('User_model');
		// $user_id = $this->session->userdata('user_id');
		// $user = $this->User_model->get_user($user_id);
	
		// Mendapatkan data product berdasarkan ID
		$this->load->model('Category_model');
		$categoryByid = $this->Category_model->getCategoryById($category_id);
		// var_dump($categoryByid);
	
		// Mendapatkan data category
		$this->load->model('Category_model');
		$categories = $this->Category_model->getAllCategory();
	
		if ($categoryByid) {
			// $data['user'] = $user;
			$data['categoryByid'] = $categoryByid;
			$data['categories'] = $categories;
	
			$this->load->view('Admin/partials/header');
			$this->load->view('Admin/category/edit', $data);
			$this->load->view('Admin/partials/footer');
		} else {
			echo "category not found";
		}
	}

	public function update() {
		// Memeriksa apakah metode yang digunakan adalah metode POST
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Mengambil data yang dikirimkan melalui formulir
			$category_id = $this->input->post('kategori_id');
			$kategori = $this->input->post('kategori');
			$image = $this->input->post('image');

			$categoryByid = $this->Category_model->getCategoryById($category_id);
			$oldImage = $categoryByid->image;

			if ($image == null){
				$image = $oldImage;
				$this->form_validation->set_rules('kategori', 'Kategori', 'required');

				$data = array(
					'category_name' => $kategori,
					'image' => $image
				);
		
				
		
				// Memperbarui data produk di database
				// Misalnya, menggunakan model 'Product_model'
				$this->load->model('Category_model');
				$this->Category_model->updateCategory($category_id, $data); // Menyertakan $product_id sebagai argumen pertama
		
				// Periksa apakah pembaruan berhasil
				if ($this->db->affected_rows() > 0) {
					// Jika pembaruan berhasil, tampilkan pesan sukses atau redirect ke halaman lain
					redirect('admin-category');
				} else {
					redirect('admin-edit-category/'. $category_id);
				}
			} else {
				// Lakukan validasi data jika diperlukan
				$this->form_validation->set_rules('kategori', 'Kategori', 'required');
				$this->form_validation->set_rules('image', 'Image', 'required');

				$data = array(
					'category_name' => $kategori,
					'image' => $image
				);
		
				
		
				// Memperbarui data produk di database
				// Misalnya, menggunakan model 'Product_model'
				$this->load->model('Category_model');
				$this->Category_model->updateCategory($category_id, $data); // Menyertakan $product_id sebagai argumen pertama
		
				// Periksa apakah pembaruan berhasil
				if ($this->db->affected_rows() > 0) {
					// Jika pembaruan berhasil, tampilkan pesan sukses atau redirect ke halaman lain
					redirect('admin-category');
				} else {
					redirect('admin-edit-category/'. $category_id);
				}
			}

		} else {
			echo "error";
		}
	}

	public function delete($category_id) 
	{
		// Memuat model 'Product_model'
		$this->load->model('Category_model');
	
		// Memanggil metode 'deleteProduct' pada model dengan ID produk yang diterima
		$this->Category_model->deleteCategory($category_id);
	
		// Redirect kembali ke halaman daftar produk setelah penghapusan
		redirect('admin-category');
	}
}
