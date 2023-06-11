<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {
    public function get_user($user_id) {
        // Ambil data pengguna berdasarkan user_id
        $query = $this->db->get_where('users', array('id' => $user_id));

        if ($query->num_rows() == 1) {
            // Jika pengguna ditemukan, kembalikan data pengguna
            return $query->row();
        } else {
            // Jika pengguna tidak ditemukan, kembalikan false
            return false;
        }
    }

    public function getRoleUserCount($role) {
        $this->db->where('role_id', $role);
        $this->db->from('users');
        return $this->db->count_all_results();
    }

    public function getAllCustomer($role) {
        $this->db->where('role_id', $role);
        $this->db->from('users');
        return $this->db->get()->result();
    }

    public function getAllUserCount() {
        return $this->db->count_all('users');
    }

    public function getAllUser() {
        return $this->db->get('users')->result();
    }

    public function getUserById($users_id) {
        return $this->db->get_where('users', array('id' => $users_id))->row();
    }
    
    public function updateUser($user_id, $data) {

        
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    public function deleteUser($users_id) {
        $this->db->where('id', $users_id);
        $this->db->delete('users');
    }    
    
}
