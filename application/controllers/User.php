<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	
    public function editProfile() 
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user($user_id);

        if ($user->role_id == 1)
        {
            $data = array(
                'user' => $user,
            );
            $this->load->view('Admin/partials/header');
            $this->load->view('Admin/partials/navbar', $data);
            $this->load->view('Profile/edit-profile', $data);
            $this->load->view('Admin/partials/footer');
        } else {
            $data = array(
                'user' => $user,
            );
            $this->load->view('customer/partials/header');
            $this->load->view('Profile/edit-profile-cust', $data);
            $this->load->view('customer/partials/footer');
        }
    }	

    public function updateProfile()
    {
        // Memeriksa apakah metode yang digunakan adalah metode POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Mengambil data yang dikirimkan melalui formulir
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $alamat = $this->input->post('alamat');
            $image = $this->input->post('image');
            $deskripsi = $this->input->post('deskripsi');
    
            // Lakukan validasi data jika diperlukan
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('phone', 'phone', 'required');
            $this->form_validation->set_rules('alamat', 'alamat', 'required');
            $this->form_validation->set_rules('image', 'image');
            $this->form_validation->set_rules('deskripsi', 'deskripsi');

            $user_id = $this->session->userdata('user_id');
            $user = $this->User_model->get_user($user_id);

            if ($image == null){
                $image = $user->image;
            }
            // var_dump($image);
            // exit();
    
            if ($this->form_validation->run() == FALSE) {
                // Jika validasi gagal, tampilkan kembali halaman edit profile dengan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data.');
                redirect('edit-profile');
            } else {
                // Jika validasi sukses, lakukan update data profil di database
                $data = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'alamat' => $alamat,
                    'image' => $image,
                    'deskripsi' => $deskripsi
                );

                // Memeriksa apakah ada file gambar yang diunggah

                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $config['upload_path'] = FCPATH.'/assets/images/avatar';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['overwrite']     = true;
                    $config['max_size'] = 2048; // ukuran maksimum dalam kilobyte (KB)
                    $config['encrypt_name'] = true; // mengenkripsi nama file

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);


                    if (!$this->upload->do_upload('image')) {
                        // Jika upload gagal, tampilkan pesan error
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', 'Error: ' . $error);
                        redirect('edit-profile');
                    } else {
                        // Jika upload berhasil, ambil informasi file yang diunggah
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];

                        // Tambahkan nama file ke data yang akan diupdate
                        $data['image'] = $filename;
                        echo $filename; 
                    }
                }
    
                // Panggil model yang sesuai untuk melakukan update data profil
                $user_id = $this->session->userdata('user_id');
                $this->User_model->updateUser($user_id, $data);
    
                if ($this->db->affected_rows() > 0) {
                    // Jika update berhasil, tampilkan pesan sukses atau redirect ke halaman lain
                    $this->session->set_flashdata('success', 'Update Profile berhasil diubah.');
                    redirect('edit-profile');
                } else {
                    // Jika update gagal, redirect ke halaman edit profile dengan pesan error
                    $this->session->set_flashdata('error', 'Gagal mengubah data.');
                    redirect('edit-profile');
                }
            }
        } else {
            // Jika metode yang digunakan bukan metode POST, tampilkan halaman edit profile
            $this->load->view('Admin/partials/header');
            $this->load->view('Profile/edit-profile-cust');
            $this->load->view('Admin/partials/footer');

        }
    }

    public function deleteAccount()
    {
        $user_id = $this->session->userdata('user_id');
        $user = $this->User_model->get_user($user_id);
        $password = $this->input->post('password');

        if ($user && password_verify($password, $user->password)) {
            $this->User_model->deleteUser($user_id);
            redirect('login');
        } else {
            $this->session->set_flashdata('error', 'Password Salah.');
            redirect('edit-profile');
        }

    }
}
