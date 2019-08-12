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
$route['default_controller'] = 'bookscontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/*
| -------------------------------------------------------------------------
| ABOUT
| -------------------------------------------------------------------------
*/
$route['about'] = 'welcome/about';
/*
| -------------------------------------------------------------------------
| CONTACTS
| -------------------------------------------------------------------------
*/
$route['contacts'] = 'contacts';
$route['create'] = 'contacts/create';
$route['store'] = 'contacts/store';
$route['edit/:id'] = 'contacts/edit';
$route['update/:id'] = 'contacts/update';
$route['delete/:id'] = 'contacts/delete';
$routes['users'] = 'welcome/users';
/*
| -------------------------------------------------------------------------
| ACTIVE RECORD
| -------------------------------------------------------------------------
*/
$route['ar'] = 'activerecordcontroller';
$route['ar/insert'] = 'activerecordcontroller/store_order';
$route['ar/update'] = 'activerecordcontroller/update_order';
/*
| -------------------------------------------------------------------------
| AUTHORS : Page Navigation
| -------------------------------------------------------------------------
*/
$route['authors/(:num)'] = 'authors';
/*
| -------------------------------------------------------------------------
| SESSION FLASH DATA
| -------------------------------------------------------------------------
*/
$route['flash_index'] = 'sessioncontroller';
$route['flash_message'] = 'sessioncontroller/flash_message';
/*
| -------------------------------------------------------------------------
| STORING USER DATA in CI SESSIONS
| -------------------------------------------------------------------------
*/
$route['login'] = 'sessioncontroller/login';
$route['authenticate'] = 'sessioncontroller/authenticate';
$route['settings'] = 'sessioncontroller/settings';
$route['dashboard'] = 'sessioncontroller/dashboard';
$route['logout'] = 'sessioncontroller/logout';
/*
| -------------------------------------------------------------------------
| FILE UPLOAD
| -------------------------------------------------------------------------
*/
$route['upload-image'] = 'imageuploadcontroller';
$route['store-image'] = 'imageuploadcontroller/store';

/*
| -------------------------------------------------------------------------
| START
| -------------------------------------------------------------------------
*/
$route['books'] = 'bookscontroller';
$route['books/(:num)'] = 'bookscontroller';
