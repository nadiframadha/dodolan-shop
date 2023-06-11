<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Cart_model extends CI_Model
{
    public function addItem($item_data)
    {
        // Memeriksa apakah user telah login
        if ($this->session->userdata('user_id')) {
            // User telah login, tambahkan item ke chart
            $user_id = $this->session->userdata('user_id');
            $item_data['user_id'] = $user_id;

            // Simpan data item ke dalam tabel chart di database
            $this->db->insert('cart_items', $item_data);
        } else {
            // User belum login, redirect ke halaman login
            redirect('login');
        }
    }

    public function getCartByUser($user_id)
    {
        $this->db->select('cart_items.*, products.item_name, products.image, products.stock, products.color, products.rating');
        $this->db->from('cart_items');
        $this->db->join('products', 'products.id = cart_items.item_id');
        $this->db->where('cart_items.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCartByStatus($cart_id)
    {
        $this->db->select('cart_items.*, products.item_name, products.image, products.stock, products.color, products.rating');
        $this->db->from('cart_items');
        $this->db->join('products', 'products.id = cart_items.item_id');
        $this->db->where('cart_items.status', $cart_id);
        $query = $this->db->get();
        return $query->result();
    }


    public function getTotalPriceByUser($user_id)
    {
        $this->db->select_sum('total_price');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('cart_items');
        $result = $query->row();
        return intval($result->total_price);
    }

    public function getTotalItemPriceByUser($user_id)
    {
        $this->db->select_sum('item_price');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('cart_items');
        $result = $query->row();
        return intval($result->item_price);
    }

    //get data array
    public function getPriceByItem($cart_id)
    {
        $this->db->select('*');
        $this->db->from('cart_items');
        $this->db->where_in('id', $cart_id);
        $query = $this->db->get();
        $result = $query->row();

        if ($result) {
            return intval($result->item_price);
        } else {
            return 0; // Atau nilai default lainnya jika tidak ada data yang ditemukan
        }
    }


    public function getItemCartCount($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->from('cart_items');
        return $this->db->count_all_results();
    }

    public function updateCart($cart_id, $data)
    {


        $this->db->where('id', $cart_id);
        $this->db->update('cart_items', $data);
    }

    public function deleteItemCart($cart_id)
    {
        $this->db->where('id', $cart_id);
        $this->db->delete('cart_items');
    }
}
