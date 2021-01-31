<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/test', 'Home::index');

///$routes->get('/admin/bike', 'Bike::index');
//$routes->get('/vish', 'App\Controllers\Tyre\Bike::index');

//$routes->resource('bike', ['controller' =>'App\Controllers\admin']);
$routes->add('/tyre/bike/car', 'Bike::car', ['namespace' => 'App\Controllers\Tyre']);
 
$routes->get('/user/add', 'User::add');
$routes->get('/user', 'User::index');
 

$routes->get('/student/add', 'Student::add');
$routes->post('/student/add', 'Student::add');
$routes->get('/student', 'Student::index');
$routes->get('/student/remove', 'Student::remove');

$routes->get('/student/edit/(:num)', 'Student::add/$1');

$routes->post('/student/edit/(:num)', 'Student::add/$1');

$routes->get('/student/delete/(:num)', 'Student::deleteRecord/$1');

$routes->get('/user/code/(:num)/(:any)', 'User::code/$1/$2');
 
$routes->resource('demo', ['controller' =>'App\User']);
//$routes->get('/user/test/(:num)', 'User::test/$1');

$routes->addRedirect('codeimprove', '/user/add');

$routes->group('admin', function($routes)
{
	$routes->get('user/test/(:num)', 'User::test/$1');

	$routes->get('user/codeImprove', 'User::codeImprove');

});
 
/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
