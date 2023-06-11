<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function getProductCount() {
        return $this->db->count_all('orders');
    }

    public function addOrder($order_data)
    {
        $this->db->insert('orders', $order_data);
    }

    public function updateStatus($order_id, $data)
    {


        $this->db->where('id', $order_id);
        $this->db->update('orders', $data);
    }

    public function getOrderItemById($order_id) {
        $this->db->select('orders.*, order_items.quantity, products.item_name, order_items.item_id, products.image, products.stock, products.color,');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $this->db->join('products', 'products.id = order_items.item_id');
        $this->db->where('orders.id', $order_id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getOrderDetail($order_id) {
        $this->db->select('orders.*, order_items.quantity, products.item_name, order_items.item_id, products.image, products.price, products.color,');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $this->db->join('products', 'products.id = order_items.item_id');
        $this->db->order_by('orders.id', 'DESC');
        $this->db->where('orders.id', $order_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getLastOrderByUserId($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('orders');
        return $query->row(); // Mengembalikan data order terakhir berdasarkan user_id
    }
    
    public function getOrderByUser($user_id)
    {
        $this->db->select('orders.*, order_items.quantity, products.item_name, order_items.item_id, products.image, products.price, products.color,');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $this->db->join('products', 'products.id = order_items.item_id');
        $this->db->order_by('orders.id', 'DESC');
        $this->db->where('orders.user_id', $user_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getOrderById($order_id)
    {
        $this->db->select('orders.*, order_items.quantity, products.item_name, order_items.item_id, products.image, products.price, products.color,');
        $this->db->from('orders');
        $this->db->join('order_items', 'order_items.order_id = orders.id');
        $this->db->join('products', 'products.id = order_items.item_id');
        $this->db->order_by('orders.id', 'DESC');
        $this->db->where('orders.id', $order_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getCountByUserId($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->from('orders');
        return $this->db->count_all_results();
    }
}
