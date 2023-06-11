<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function pelanggan()
	{
		$this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar');
		$this->load->view('Admin/laporan/laporan-data-pelanggan');
		$this->load->view('Admin/partials/footer');
	}

    public function product()
    {
        $this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar');
		$this->load->view('Admin/laporan/laporan-data-product');
		$this->load->view('Admin/partials/footer');
    }

    public function penjualan()
    {
        $this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar');
		$this->load->view('Admin/laporan/laporan-data-penjualan');
		$this->load->view('Admin/partials/footer');
    }
}
