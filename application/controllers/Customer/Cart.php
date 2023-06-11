<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('user_id')) {

            $user_id = $this->session->userdata('user_id');
            $user = $this->User_model->get_user($user_id);

            // Menampilkan jumlah produk dan data produk
            $this->load->model('Product_model');
            $jumlahProduk = $this->Product_model->getProductCount();
            $products = $this->Product_model->getAllProducts();

            // Menampilkan jumlah order
            $this->load->model('Order_model');
            $jumlahOrder = $this->Order_model->getProductCount();

            //menampilkan item chart
            $cart = $this->Cart_model->getCartByUser($user_id);
            //total item price
            $subtotal = $this->Cart_model->getTotalPriceByUser($user_id);
            $sumItemPrice = $this->Cart_model->getTotalItemPriceByUser($user_id);


            //total item dalam cart
            $jmlItem = $this->Cart_model->getItemCartCount($user_id);

            if ($cart == null) {
                $data = array(
                    'user' => $user,
                    'jumlahProduk' => $jumlahProduk,
                    'products' => $products,
                    'jumlahOrder' => $jumlahOrder,
                    'cart' => $cart,
                    'totalItemPrice' => $sumItemPrice,
                    'jmlItem' => $jmlItem,
                    
                );
                $this->load->view('Customer/partials/header', $data);
                $this->load->view('Customer/partials/navbar');
                $this->load->view('Customer/cart/empty-cart');
                $this->load->view('Customer/partials/footer');
            } else  {
                //coupon
                $code = $this->input->post('coupon_code');
                if ($code != null) {
                    $coupon = $this->Coupon_model->getCouponByCode($code);
                    $datacoupon = $coupon->discount;
                    $disc = $datacoupon / 100;
                    $discount = $subtotal * $disc;
                    // pajak
                    $tax = 0.10;
                    $totalTax = $subtotal * $tax;

                    //total bayar
                    $totalBayar = $subtotal + $totalTax - $discount;
                    // Data untuk dikirim ke view
                    $data = array(
                        'user' => $user,
                        'jumlahProduk' => $jumlahProduk,
                        'products' => $products,
                        'jumlahOrder' => $jumlahOrder,
                        'cart' => $cart,
                        'totalItemPrice' => $sumItemPrice,
                        'subtotal' => $subtotal,
                        'jmlItem' => $jmlItem,
                        'totalBayar' => $totalBayar,
                        'totalTax' => $totalTax,
                        'discount' => $discount,
                    );

                    $this->load->view('Customer/partials/header', $data);
                    $this->load->view('Customer/partials/navbar');
                    $this->load->view('Customer/cart/mycart', $data);
                    $this->load->view('Customer/partials/footer');
                } else {

                    $discount = $subtotal * 0;
                    // pajak
                    $tax = 0.10;
                    $totalTax = $subtotal * $tax;

                    //total bayar
                    $totalBayar = $subtotal + $totalTax - $discount;
                    // Data untuk dikirim ke view
                    $data = array(
                        'user' => $user,
                        'jumlahProduk' => $jumlahProduk,
                        'products' => $products,
                        'jumlahOrder' => $jumlahOrder,
                        'cart' => $cart,
                        'totalItemPrice' => $sumItemPrice,
                        'subtotal' => $subtotal,
                        'jmlItem' => $jmlItem,
                        'totalBayar' => $totalBayar,
                        'totalTax' => $totalTax,
                        'discount' => $discount,
                    );


                    $this->load->view('Customer/partials/header', $data);
                    $this->load->view('Customer/partials/navbar');
                    $this->load->view('Customer/cart/mycart', $data);
                    $this->load->view('Customer/partials/footer');
                }
            }
        } else  {
            redirect('login');
        }
        
    }

    public function create($product_id)
    {
        // Memeriksa apakah user telah login
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            $product = $this->Product_model->getProductById($product_id);
            // var_dump($product);
            // exit();

            // User telah login, dapatkan data item yang akan ditambahkan dari form
            $item_data = array(
                'user_id' => $user_id,
                'item_id' => $product->id,
                'item_price' => $product->price,

            );

            // Panggil method addItem dari model Chart_model untuk menambahkan item
            $this->Cart_model->addItem($item_data);

            // Tampilkan pesan sukses atau lakukan redirect ke halaman chart
            $this->session->set_flashdata('success', 'Item berhasil ditambahkan ke chart.');
            redirect('product');
        } else {
            // User belum login, redirect ke halaman login
            redirect('login');
        }
    }

    // public function update()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Mengambil data yang dikirimkan melalui formulir
    //         $cart_id = $this->input->post('cart_id');
    //         $jumlah_item = $this->input->post('jumlah_item');

    //         $getpriceItem = $this->Cart_model->getPriceByItem($cart_id);
    //         $priceItem = $getpriceItem;
    //         $totalPriceByItem = $priceItem * $jumlah_item;


    //         $data = array(
    //             'jumlah_item' => $jumlah_item,
    //             'total_price' => $totalPriceByItem
    //         );

    //         // Memperbarui data produk di database
    //         // Misalnya, menggunakan model 'Product_model'
    //         $this->load->model('Cart_model');
    //         $this->Cart_model->updateCart($cart_id, $data); // Menyertakan $product_id sebagai argumen pertama

    //         redirect('mychart');
    //     }
    // }

    public function update()
    {
        $cart_ids = $_POST['cart_id'];
        $jumlah_items = $_POST['jumlah_item'];

        // $getpriceItem = $this->Cart_model->getPriceByItem($cart_ids);
       


        // Loop melalui setiap ID dalam array $cart_ids
        foreach ($cart_ids as $cart_id) {
            // Periksa apakah ID ada dalam array $jumlah_items
            if (isset($jumlah_items[$cart_id])) {
                $jumlah_item = $jumlah_items[$cart_id];

                $query = $this->db->get_where('cart_items', array('id' => $cart_id));
                $result = $query->row();
                $item_price = $result->item_price;
                // Hitung total_price berdasarkan item_price dan jumlah_item
                $total_price = $item_price * $jumlah_item;
                $status = 1;

                // Lakukan operasi pembaruan yang sesuai menggunakan $cart_id dan $jumlah_item
                $this->db->update(
                    'cart_items',
                    array('jumlah_item' => $jumlah_item, 'total_price' => $total_price, 'status' => $status),
                    array('id' => $cart_id)
                );
            }
        }
        $this->session->set_flashdata('success', 'Item berhasil diupdate.');

        redirect('mychart');
    }

    public function delete($cart_id)
    {
        // Memuat model 'Product_model'
        $this->load->model('Cart_model');

        // Memanggil metode 'deleteProduct' pada model dengan ID produk yang diterima
        $this->Cart_model->deleteItemCart($cart_id);

        // Redirect kembali ke halaman daftar produk setelah penghapusan
        redirect('mychart');
    }
}
