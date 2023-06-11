<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Coupon_model extends CI_Model {
    public function getCouponByCode($code) {
        return $this->db->get_where('coupons', array('kode_coupon' => $code))->row();
    }
}
