<?php

class Order extends CI_Controller
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

            //total item dalam cart
            $jmlItem = $this->Cart_model->getItemCartCount($user_id);

            //get last order
            $last_order = $this->Order_model->getLastOrderByUserId($user_id);
            $orderId = $last_order->id;

            //get order
            $getOrderItem = $this->Order_model->getOrderItemById($orderId);
            $getorderByid = $this->Order_model->getOrderById($orderId);
            // var_dump($getorderByid);

            $sumItemPrice = $this->Cart_model->getTotalItemPriceByUser($user_id);
            
            
            // Data untuk dikirim ke view
            $data = array(
                'user' => $user,
                'cart' => $cart,
                'jumlahProduk' => $jumlahProduk,
                'products' => $products,
                'jumlahOrder' => $jumlahOrder,
                'totalItemPrice' => $sumItemPrice,
                'jmlItem' => $jmlItem,
                'order' => $getOrderItem,
                'subtotal' => $getorderByid->subtotal,
                'discount' => $getorderByid->discount,
                'totalTax' => $getorderByid->tax,
                'totalBayar' => $getorderByid->total_cost
                
            );

            $this->load->view('Customer/partials/header', $data);
            $this->load->view('Customer/partials/navbar');
            $this->load->view('Customer/transaction/checkout', $data);
            $this->load->view('Customer/partials/footer');
        } else{
            redirect('login');
        }
    }

    public function create()
    {
        // Memeriksa apakah user telah login
        if ($this->session->userdata('user_id')) {
            $user_id = $this->session->userdata('user_id');
            $subtotal = $this->input->post('subtotal');
            $totalPrice = $this->input->post('total_price');
            $discount = $this->input->post('discount');
            $tax = $this->input->post('tax');

            $status = 1;
            $cart = $this->Cart_model->getCartByStatus($status);
            
            
            $item_data = array(
                'user_id' => $user_id,
                'subtotal' => $subtotal,
                'total_cost' => $totalPrice,
                'discount' => $discount,
                'tax' => $tax,
                
            );

            // Panggil method addItem dari model Chart_model untuk menambahkan item
            $this->Order_model->addOrder($item_data);
            $order_id = $this->db->insert_id();

            $order_items = array();
            foreach ($cart as $item) {
                $order_items[] = array(
                    'order_id' => $order_id,
                    'item_id' => $item->item_id,
                    'quantity' => $item->jumlah_item
                );
            }
            // var_dump($order_items);
            // exit();
            if (empty($order_items)){
                redirect('mychart');
            }
            $this->Order_items_model->create_order_items($order_items);

            //delete cart saat melakukan checkout
            $this->db->delete('cart_items', array('status' => 1));

            //kurangi stock product
            $orderItems = $this->Order_model->getOrderItemById($order_id);
            foreach ($orderItems as $orderItem) {
                $productId = $orderItem->item_id;
                $quantity = $orderItem->quantity;
            
                // Mengurangi stok produk
                $this->Product_model->reduceStock($productId, $quantity);
            }
            
            // Tampilkan pesan sukses atau lakukan redirect ke halaman chart
            redirect('checkout');
        } else {
            // User belum login, redirect ke halaman login
            redirect('login');
        }
    }
    public function allOrdersByUser()
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

            //$jmlh order by user
            $jmlhOrder = $this->Order_model->getCountByUserId($user_id);

            //total item price
            $totalItemPrice = $this->Cart_model->getTotalItemPriceByUser($user_id);
            // var_dump($totalItemPrice);
            // exit();

            //total item dalam cart
            $jmlItem = $this->Cart_model->getItemCartCount($user_id);

            $order = $this->Order_model->getOrderByUser($user_id);
            // var_dump($order);
            // exit();
            
            
            // Data untuk dikirim ke view
            $data = array(
                'user' => $user,
                'jumlahProduk' => $jumlahProduk,
                'products' => $products,
                'jumlahOrder' => $jumlahOrder,
                'jmlItem' => $jmlItem,
                'order' => $order,
                'cart' => $cart,
                'totalItemPrice' => $totalItemPrice,
                'jmlhOrder' => $jmlhOrder
                
                
            );

            if ($order != null){
                $this->load->view('Customer/partials/header', $data);
                $this->load->view('Customer/partials/navbar');
                $this->load->view('Customer/transaction/myorder', $data);
                $this->load->view('Customer/partials/footer');
            } else {
                $this->load->view('Customer/partials/header', $data);
                $this->load->view('Customer/partials/navbar');
                $this->load->view('Customer/transaction/empty-order');
                $this->load->view('Customer/partials/footer');
            }

            
        } else{
            redirect('login');
        }
    }

    public function orderDetail($order_id)
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
            $totalItemPrice = $this->Cart_model->getTotalItemPriceByUser($user_id);
            // var_dump($totalItemPrice);
            // exit();

            //total item dalam cart
            $jmlItem = $this->Cart_model->getItemCartCount($user_id);

            $order = $this->Order_model->getOrderDetail($order_id);
            $costDetail = $this->Order_model->getOrderById($order_id);
            // var_dump($order);
            // exit();
            
            
            // Data untuk dikirim ke view
            $data = array(
                'user' => $user,
                'jumlahProduk' => $jumlahProduk,
                'products' => $products,
                'jumlahOrder' => $jumlahOrder,
                'jmlItem' => $jmlItem,
                'order' => $order,
                'cart' => $cart,
                'totalItemPrice' => $totalItemPrice,
                'order_id' => $order_id,
                'costDetail' => $costDetail
                
                
            );
            $this->load->view('Customer/partials/header', $data);
            $this->load->view('Customer/partials/navbar');
            $this->load->view('Customer/transaction/order-detail', $data);
            $this->load->view('Customer/partials/footer');
        } else {
            redirect('login');
        }
        
    }

    public function placeOrder()
    {
        $status = 'lunas';
        $data = array(
            'status' => $status
        );
        $user_id = $this->session->userdata('user_id');
        $order = $this->Order_model->getLastOrderByUserId($user_id);
        $orderID = $order->id;
        $this->db->where('orders.id',$orderID);
        $this->db->update('orders', $data);

        //delete cart yg telah di order        
        $this->db->delete('cart_items', array('status' => 1));
        
        $this->session->set_flashdata('success', 'Order berhasil dilakukan.');

        redirect('myorder');
    }


    public function delete($cart_id)
    {
        // Memuat model 'Product_model'
        $this->load->model('Cart_model');

        // Memanggil metode 'deleteProduct' pada model dengan ID produk yang diterima
        $this->Cart_model->deleteItemCart($cart_id);

        // Redirect kembali ke halaman daftar produk setelah penghapusan
        redirect('home');
    }
}
