<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database(); // Memuat library database
    }

    public function index() {
        $this->load->view('Guest/partials/header');
        $this->load->view('Guest/partials/navbar');
        $this->load->view('Auth/register');
        $this->load->view('Guest/partials/footer');  }

    public function process_registration() {
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
       

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Guest/partials/header');
            $this->load->view('Guest/partials/navbar');
            $this->load->view('Auth/register');
            $this->load->view('Guest/partials/footer');
        } else {
            // Ambil data dari formulir
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
    
            // Enkripsi password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
            // Lakukan proses penyimpanan data ke database
            // Contoh: Simpan data ke tabel "users"
            $data = array(
                'name' => $name,
                'email' => $email,
                'password' => $hashed_password,
                'role_id' => 2,
            );
            $this->db->insert('users', $data);
    
            // Redirect ke halaman login atau halaman lain yang diinginkan
            redirect('login');
        }
    }

}

