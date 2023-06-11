<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model {
    public function getProductCount() {
        return $this->db->count_all('products');
    }

    public function getAllProducts() {
        return $this->db->get('products')->result();
    }

    public function getBestProduct() {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('produk_unggulan', 1);
        $query = $this->db->get();

        $results = $query->result();
        return $results;

    }

    public function getBestSelling() {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('best_selling', 1);
        $query = $this->db->get();

        $results = $query->result();
        return $results;

    }
    public function getProductByCategory($category_id)
    {
        return $this->db->get_where('products', array('category_id' => $category_id))->result();

    }

    public function getProductById($product_id) {
        return $this->db->get_where('products', array('id' => $product_id))->row();
    }
    public function detailProduct($product_id)
    {
        return $this->db->get_where('products', array('id' => $product_id))->result();

    }

    public function filterProducts($kategori_ids, $ratings, $stockOnly)
    {
        $this->db->select('*');
        $this->db->from('products');

        if (!empty($kategori_ids)) {
            $this->db->where_in('category_id', $kategori_ids);
        }

        if (!empty($ratings)) {
            $this->db->where_in('rating', $ratings);
        }
        if ($stockOnly == true) {
            $this->db->where('stock >', 0);
        }

        $this->db->where('stock >=', 0);

        $query = $this->db->get();
        return $query->result();
    }

    public function searchProducts($keyword)
    {
        $this->db->like('item_name', $keyword);
        $query = $this->db->get('products');
        return $query->result_array();
    }
    
    public function updateProduct($product_id, $data) {

        
        $this->db->where('id', $product_id);
        $this->db->update('products', $data);
    }

    public function deleteProduct($product_id) {
        $this->db->where('id', $product_id);
        $this->db->delete('products');
    }  


    public function reduceStock($productId, $quantity) {
        $this->db->set('stock', 'stock - ' . $quantity, false);
        $this->db->where('id', $productId);
        $this->db->update('products');
    }
    
    
}
