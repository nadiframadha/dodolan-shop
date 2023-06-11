<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'guest';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//admin
$route['admin'] = 'admin/dashboard';

$route['admin-product'] = 'admin/product/index';
$route['admin-create-product'] = 'admin/product/create';
$route['admin-store-product'] = 'admin/product/store';
$route['admin-edit-product/(:any)'] = 'admin/product/edit/$1';
$route['admin-update-product'] = 'admin/product/update';
$route['admin-delete-product/(:any)'] = 'admin/product/delete/$1';

$route['admin-category'] = 'admin/category/index';
$route['admin-create-category'] = 'admin/category/create';
$route['admin-store-category'] = 'admin/category/store';
$route['admin-edit-category/(:any)'] = 'admin/category/edit/$1';
$route['admin-update-category'] = 'admin/category/update';
$route['admin-delete-category/(:any)'] = 'admin/category/delete/$1';

$route['admin-customer'] = 'admin/customer/index';
$route['admin-create-customer'] = 'admin/customer/create';
$route['admin-store-customer'] = 'admin/customer/store';
$route['admin-edit-customer/(:any)'] = 'admin/customer/edit/$1';
$route['admin-update-customer'] = 'admin/customer/update';
$route['admin-edit-customer/(:any)'] = 'admin/customer/edit/$1';

$route['admin-transaction-penjualan'] = 'admin/transaction/dataPenjualan';
$route['admin-transaction-invoice'] = 'admin/transaction/dataInvoice';

$route['admin-laporan-penjualan'] = 'admin/laporan/penjualan';
$route['admin-laporan-pelanggan'] = 'admin/laporan/pelanggan';
$route['admin-laporan-product'] = 'admin/laporan/product';



// customer
$route['home'] = 'customer/home';
$route['contact'] = 'customer/home/contact';

$route['product'] = 'customer/product';
$route['detail-product/(:any)'] = 'customer/product/detailProduct/$1';
$route['product-by-category/(:any)'] = 'customer/product/productByCategory/$1';
$route['filter-product'] = 'customer/product/filterProducts';
$route['search-product'] = 'customer/product/searchProducts';


$route['checkout'] = 'customer/order/index';
$route['empty-chart'] = 'customer/transaction/emptyChart';

$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/login/logout';


$route['mychart'] = 'customer/cart/index';
$route['add-to-cart/(:any)'] = 'customer/cart/create/$1';
$route['delete-item-cart/(:any)'] = 'customer/cart/delete/$1';
$route['update-cart'] = 'customer/cart/update';


$route['order/applyCoupon'] = 'customer/order/applyCoupon';
$route['add-orders'] = 'customer/order/create';
$route['place-order'] = 'customer/order/placeOrder';
$route['myorder'] = 'customer/order/allOrdersByUser';
$route['order-detail/(:any)'] = 'customer/order/orderDetail/$1';



//profile
$route['edit-profile'] = 'user/editProfile';
$route['update-profile/(:any)'] = 'admin/customer/edit/$1';

//guest
$route['guest-home'] = 'guest/index';





