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
// $route['404_override'] = '';
$route['default_controller'] = 'LandingController';
$route['404_override'] = 'NotFoundController';
$route['translate_uri_dashes'] = FALSE;

// Auth Route
$route['register'] = 'AuthController/register';
$route['login'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';
// Auth Verify Route
$route['auth/verify'] = 'AuthController/verify';
$route['auth/verify/test'] = 'AuthController/verify_test';

// Landing Route
$route['/'] = 'LandingController/index';
$route['beranda'] = 'LandingController/index';
// $route['berita'] = 'LandingController/berita';
$route['bantuan'] = 'LandingController/bantuan';
$route['kontak-kami'] = 'LandingController/kontak_kami';
$route['tentang-kami'] = 'LandingController/tentang_kami';

// User API Route
$route['umkm'] = 'UserAPIController/list_umkm';
$route['umkm/detail/(:any)'] = 'UserAPIController/detail_umkm/$1';
$route['jasa'] = 'UserAPIController/list_jasa';
$route['jasa/detail/(:any)'] = 'UserAPIController/detail_jasa/$1';
$route['search'] = 'UserAPIController/search';
$route['wishlist'] = 'UserAPIController/wishlistadd';
$route['wishlist/remove/(:num)'] = 'UserAPIController/wishlistremove/$1';
$route['review/(:any)'] = 'UserAPIController/review/$1';

// Dashboard Route
$route['dashboard'] = 'DashboardController/index';
$route['wishlist-saya'] = 'DashboardController/wishlist';
$route['profil'] = 'DashboardController/profil';

// UMKM Route
$route['kelola-umkm'] = 'UmkmJasaController/list_data_umkm';
$route['kelola-umkm/add'] = 'UmkmJasaController/add_data_umkm';
$route['kelola-umkm/edit/(:num)'] = 'UmkmJasaController/edit_data_umkm/$1';
$route['kelola-umkm/delete/(:num)'] = 'UmkmJasaController/delete_data_umkm/$1';

// Jasa Route
$route['kelola-jasa'] = 'UmkmJasaController/list_data_jasa';
$route['kelola-jasa/add'] = 'UmkmJasaController/add_data_jasa';
$route['kelola-jasa/edit/(:num)'] = 'UmkmJasaController/edit_data_jasa/$1';
$route['kelola-jasa/delete/(:num)'] = 'UmkmJasaController/delete_data_jasa/$1';

// Kategori Route
$route['kelola-kategori'] = 'KategoriController/list_data_kategori';
$route['kelola-kategori/add'] = 'KategoriController/add_data_kategori';
$route['kelola-kategori/edit/(:num)'] = 'KategoriController/edit_data_kategori/$1';
$route['kelola-kategori/delete/(:num)'] = 'KategoriController/delete_data_kategori/$1';

// Produk Route
$route['kelola-produk'] = 'ProdukController/list_data_produk';
$route['kelola-produk/add'] = 'ProdukController/add_data_produk';
$route['kelola-produk/edit/(:num)'] = 'ProdukController/edit_data_produk/$1';
$route['kelola-produk/delete/(:num)'] = 'ProdukController/delete_data_produk/$1';

// Rating Route
$route['rating'] = 'RatingController/list_data_rating';
$route['rating/edit/(:num)'] = 'RatingController/edit_data_rating/$1';
$route['rating/delete/(:num)'] = 'RatingController/delete_data_rating/$1';
$route['rating/import'] = 'RatingController/view_import_data_rating';
$route['rating/import/data'] = 'RatingController/import_data_rating';
$route['rating/import/format'] = 'RatingController/download_format_import_rating';
$route['rating/export'] = 'RatingController/export_data_rating';

// Pengguna Route
$route['kelola-pengguna'] = 'PenggunaController/list_data_pengguna';
$route['kelola-pengguna/add'] = 'PenggunaController/add_data_pengguna';
$route['kelola-pengguna/edit/(:num)'] = 'PenggunaController/edit_data_pengguna/$1';
$route['kelola-pengguna/delete/(:num)'] = 'PenggunaController/delete_data_pengguna/$1';
$route['kelola-pengguna/import'] = 'PenggunaController/view_import_data_pengguna';
$route['kelola-pengguna/import/data'] = 'PenggunaController/import_data_pengguna';
$route['kelola-pengguna/import/format'] = 'PenggunaController/download_format_import_pengguna';
$route['kelola-pengguna/export'] = 'PenggunaController/export_data_pengguna';