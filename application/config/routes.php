<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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

$route['default_controller'] = 'MainController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Operator'] = 'PengelolaController';
$route['SignIn'] = 'VerifyLogin';
$route['Admin'] = 'AdminController';
$route['Process'] = 'MainController';
$route['SignOut'] = 'MainController/logout';
$route['pdf'] = 'CetakHarianController';

//--------------------------Pengaturan Jam Kerja---------------------------//
$route['input_shift_opd'] = 'PengelolaController/input_shift_1';
$route['input_shift_guru'] = 'PengelolaController/input_shift_2';
$route['input_shift_pemadam'] = 'PengelolaController/input_shift_3';
$route['input_shift_regu_pemadam'] = 'PengelolaController/input_shift_4';
$route['jadwal_shift'] = 'PengelolaController/jadwal';
$route['jadwal_pemadam'] = 'PengelolaController/jadwal_pemadam';

//-------------------------------Absensi----------------------------------//
$route['update_absensi_harian'] = 'PengelolaController/update_harian';
$route['list_absensi_pegawai'] = 'PengelolaController/cek_harian';
$route['rekap_absensi_bulanan'] = 'PengelolaController/cek_bulanan';

//----------------------------Data Pegawai-------------------------------//
$route['list_staff'] = 'PengelolaController/list_pegawai';
