<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_items_model extends CI_Model {
    public function create_order_items($data)
    {
        $this->db->insert_batch('order_items', $data);
    }
}


