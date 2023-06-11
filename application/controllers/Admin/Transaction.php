<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function dataPennjualan()
	{
		$this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar');
		$this->load->view('Admin/transaction/data-penjualan');
		$this->load->view('Admin/partials/footer');
	}

    public function dataInvoice()
    {
        $this->load->view('Admin/partials/header');
		$this->load->view('Admin/partials/navbar');
		$this->load->view('Admin/transaction/data-invoice');
		$this->load->view('Admin/partials/footer');
    }
}
