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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['welcome'] = 'none';
$route['welcome/index'] = 'none';
$route['welcome/index/(:num)'] = 'none';
$route['welcome/search'] = 'none';
$route['welcome/results'] = 'none';
$route['welcome/results/(:any)'] = 'none';
$route['welcome/results/(:any)/(:num)'] = 'none';
$route['welcome/filter_by_productor'] = 'none';
$route['welcome/filter_by_productor/(:any)'] = 'none';
$route['welcome/filter_by_gender'] = 'none';
$route['welcome/filter_by_gender/(:any)'] = 'none';
$route['welcome/filter_by_category'] = 'none';
$route['welcome/filter_by_category/(:any)'] = 'none';
$route['welcome/watch'] = 'none';
$route['welcome/watch/(:any)'] = 'none';

$route['auth'] = 'none';
$route['auth/index'] = 'none';
$route['auth/login'] = 'none';
$route['auth/verify'] = 'none';
$route['auth/logout'] = 'none';

$route['dashboard/index'] = 'none';

$route['sessions/index'] = 'none';
$route['sessions/show'] = 'none';
$route['sessions/show/(:num)'] = 'none';

$route['users/index'] = 'none';
$route['users/store'] = 'none';
$route['users/show'] = 'none';
$route['users/show/(:num)'] = 'none';
$route['users/edit'] = 'none';
$route['users/edit/(:num)'] = 'none';
$route['users/edit_avatar'] = 'none';
$route['users/edit_avatar/(:num)'] = 'none';
$route['users/update'] = 'none';
$route['users/update/(:num)'] = 'none';
$route['users/update_avatar'] = 'none';
$route['users/update_avatar/(:num)'] = 'none';
$route['users/destroy'] = 'none';
$route['users/destroy/(:num)'] = 'none';

$route['qualities/index'] = 'none';
$route['qualities/store'] = 'none';
$route['qualities/show'] = 'none';
$route['qualities/show/(:num)'] = 'none';
$route['qualities/edit'] = 'none';
$route['qualities/edit/(:num)'] = 'none';
$route['qualities/update'] = 'none';
$route['qualities/update/(:num)'] = 'none';
$route['qualities/destroy'] = 'none';
$route['qualities/destroy/(:num)'] = 'none';

$route['categories/index'] = 'none';
$route['categories/store'] = 'none';
$route['categories/show'] = 'none';
$route['categories/show/(:num)'] = 'none';
$route['categories/edit'] = 'none';
$route['categories/edit/(:num)'] = 'none';
$route['categories/update'] = 'none';
$route['categories/update/(:num)'] = 'none';
$route['categories/destroy'] = 'none';
$route['categories/destroy/(:num)'] = 'none';

$route['genders/index'] = 'none';
$route['genders/store'] = 'none';
$route['genders/show'] = 'none';
$route['genders/show/(:num)'] = 'none';
$route['genders/edit'] = 'none';
$route['genders/edit/(:num)'] = 'none';
$route['genders/update'] = 'none';
$route['genders/update/(:num)'] = 'none';
$route['genders/destroy'] = 'none';
$route['genders/destroy/(:num)'] = 'none';

$route['productors/index'] = 'none';
$route['productors/store'] = 'none';
$route['productors/show'] = 'none';
$route['productors/show/(:num)'] = 'none';
$route['productors/edit'] = 'none';
$route['productors/edit/(:num)'] = 'none';
$route['productors/edit_logo'] = 'none';
$route['productors/edit_logo/(:num)'] = 'none';
$route['productors/update'] = 'none';
$route['productors/update/(:num)'] = 'none';
$route['productors/update_logo'] = 'none';
$route['productors/update_logo/(:num)'] = 'none';
$route['productors/destroy'] = 'none';
$route['productors/destroy/(:num)'] = 'none';

$route['movies/index'] = 'none';
$route['movies/store'] = 'none';
$route['movies/show'] = 'none';
$route['movies/show/(:num)'] = 'none';
$route['movies/edit'] = 'none';
$route['movies/edit/(:num)'] = 'none';
$route['movies/edit_cover'] = 'none';
$route['movies/edit_cover/(:num)'] = 'none';
$route['movies/update'] = 'none';
$route['movies/update/(:num)'] = 'none';
$route['movies/update_cover'] = 'none';
$route['movies/update_cover/(:num)'] = 'none';
$route['movies/destroy'] = 'none';
$route['movies/destroy/(:num)'] = 'none';

$route['newsletters/index'] = 'none';
$route['newsletters/show'] = 'none';
$route['newsletters/show/(:num)'] = 'none';
$route['newsletters/destroy'] = 'none';
$route['newsletters/destroy/(:num)'] = 'none';

$route['suggestions/index'] = 'none';

/* RESTFUL ROUTES */

$route['(:num)']['GET'] = 'welcome/index/$1';
$route['search']['POST'] = 'welcome/search';
$route['results/(:any)']['GET'] = 'welcome/results/$1';
$route['results/(:any)/(:num)']['GET'] = 'welcome/results/$1';
$route['productor/(:any)/filter']['GET'] = 'welcome/filter_by_productor/$1';
$route['productor/(:any)/filter/(:num)']['GET'] = 'welcome/filter_by_productor/$1';
$route['gender/(:any)/filter']['GET'] = 'welcome/filter_by_gender/$1';
$route['gender/(:any)/filter/(:num)']['GET'] = 'welcome/filter_by_gender/$1';
$route['category/(:any)/filter']['GET'] = 'welcome/filter_by_category/$1';
$route['category/(:any)/filter/(:num)']['GET'] = 'welcome/filter_by_category/$1';
$route['watch/(:any)']['GET'] = 'welcome/watch/$1';

$route['login']['GET'] = 'auth/login';
$route['verify']['POST'] = 'auth/verify';
$route['logout']['POST'] = 'auth/logout';

$route['dashboard']['GET'] = 'dashboard/index';

$route['sessions']['GET'] = 'sessions/index';
$route['sessions/(:num)']['GET'] = 'sessions/show/$1';

$route['users']['GET'] = 'users/index';
$route['users/create']['GET'] = 'users/create';
$route['users']['POST'] = 'users/store';
$route['users/(:num)']['GET'] = 'users/show/$1';
$route['users/(:num)/edit']['GET'] = 'users/edit/$1';
$route['users/(:num)/edit-avatar']['GET'] = 'users/edit_avatar/$1';
$route['users/(:num)']['PATCH'] = 'users/update/$1';
$route['users/(:num)']['POST'] = 'users/update_avatar/$1';
$route['users/(:num)']['DELETE'] = 'users/destroy/$1';

$route['qualities']['GET'] = 'qualities/index';
$route['qualities/create']['GET'] = 'qualities/create';
$route['qualities']['POST'] = 'qualities/store';
$route['qualities/(:num)']['GET'] = 'qualities/show/$1';
$route['qualities/(:num)/edit']['GET'] = 'qualities/edit/$1';
$route['qualities/(:num)']['PATCH'] = 'qualities/update/$1';
$route['qualities/(:num)']['DELETE'] = 'qualities/destroy/$1';

$route['categories']['GET'] = 'categories/index';
$route['categories/create']['GET'] = 'categories/create';
$route['categories']['POST'] = 'categories/store';
$route['categories/(:num)']['GET'] = 'categories/show/$1';
$route['categories/(:num)/edit']['GET'] = 'categories/edit/$1';
$route['categories/(:num)']['PATCH'] = 'categories/update/$1';
$route['categories/(:num)']['DELETE'] = 'categories/destroy/$1';

$route['genders']['GET'] = 'genders/index';
$route['genders/create']['GET'] = 'genders/create';
$route['genders']['POST'] = 'genders/store';
$route['genders/(:num)']['GET'] = 'genders/show/$1';
$route['genders/(:num)/edit']['GET'] = 'genders/edit/$1';
$route['genders/(:num)']['PATCH'] = 'genders/update/$1';
$route['genders/(:num)']['DELETE'] = 'genders/destroy/$1';

$route['productors']['GET'] = 'productors/index';
$route['productors/create']['GET'] = 'productors/create';
$route['productors']['POST'] = 'productors/store';
$route['productors/(:num)']['GET'] = 'productors/show/$1';
$route['productors/(:num)/edit']['GET'] = 'productors/edit/$1';
$route['productors/(:num)/edit-logo']['GET'] = 'productors/edit_logo/$1';
$route['productors/(:num)']['PATCH'] = 'productors/update/$1';
$route['productors/(:num)']['POST'] = 'productors/update_logo/$1';
$route['productors/(:num)']['DELETE'] = 'productors/destroy/$1';

$route['movies']['GET'] = 'movies/index';
$route['movies/create']['GET'] = 'movies/create';
$route['movies']['POST'] = 'movies/store';
$route['movies/(:num)']['GET'] = 'movies/show/$1';
$route['movies/(:num)/edit']['GET'] = 'movies/edit/$1';
$route['movies/(:num)/edit-cover']['GET'] = 'movies/edit_cover/$1';
$route['movies/(:num)']['PATCH'] = 'movies/update/$1';
$route['movies/(:num)']['POST'] = 'movies/update_cover/$1';
$route['movies/(:num)']['DELETE'] = 'movies/destroy/$1';

$route['newsletters']['GET'] = 'newsletters/index';
$route['newsletters/(:num)']['GET'] = 'newsletters/show/$1';
$route['newsletters/(:num)']['DELETE'] = 'newsletters/destroy/$1';

$route['suggestions']['GET'] = 'suggestions/index';