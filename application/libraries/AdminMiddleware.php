<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminMiddleware {
    protected $CI;

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function restrict() {
        if (!$this->CI->session->userdata('user_id')) {
            // Pengguna belum login, redirect ke halaman login
            redirect('login');
        } else {
            $role = $this->CI->session->userdata('role_user');
            if ($role != 1) {
                // Pengguna bukan admin, tampilkan pesan error atau redirect ke halaman lain yang sesuai
                redirect('home');
            }
        }
    }
}
