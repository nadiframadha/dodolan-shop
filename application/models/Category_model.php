<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model {
    public function getCategoryCount() {
        return $this->db->count_all('categories');
    }

    public function getAllCategory() {
        return $this->db->get('categories')->result();
    }

    public function getCategoryById($category_id) {
        return $this->db->get_where('categories', array('id' => $category_id))->row();
    }
    
    public function updateCategory($category_id, $data) {

        
        $this->db->where('id', $category_id);
        $this->db->update('categories', $data);
    }

    public function deleteCategory($category_id) {
        $this->db->where('id', $category_id);
        $this->db->delete('categories');
    }    
}
