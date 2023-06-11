<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->database(); // Memuat library database
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('Guest/partials/header');
        $this->load->view('Guest/partials/navbar');
        $this->load->view('Auth/login');
        $this->load->view('Guest/partials/footer');
    }

    public function process_login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Guest/partials/header');
            $this->load->view('Guest/partials/navbar');
            $this->load->view('Auth/login');
            $this->load->view('Guest/partials/footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Lakukan verifikasi login di sini
            // Misalnya, periksa kombinasi email dan password di database
            // Jika validasi berhasil, sesuaikan langkah-langkah yang diperlukan, seperti menyimpan data pengguna di sesi

            // Contoh validasi sederhana: Bandingkan email dan password dengan data di database
            $user = $this->db->get_where('users', ['email' => $email])->row();
            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('role_user', $user->role_id);

                // Redirect ke halaman yang sesuai berdasarkan peran (role) pengguna
                if ($user->role_id == 1) {
                    redirect('admin/dashboard');
                } elseif ($user->role_id == 2) {
                    redirect('home');
                } else {
                    // Peran pengguna tidak valid, tampilkan pesan error atau lakukan tindakan lain yang sesuai
                    echo "Invalid user role";
                }
            } else {
                // Login gagal, tampilkan pesan error atau lakukan tindakan lain yang sesuai
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('login');
            }
        }
    }

    public function logout() {
        // Lakukan tindakan logout di sini
        // Misalnya, hapus data pengguna dari sesi

        // Contoh tindakan logout sederhana: Hapus data pengguna dari sesi
        $this->session->sess_destroy();

        // Redirect ke halaman login atau halaman lain yang sesuai setelah logout
        redirect('login');
    }
}

