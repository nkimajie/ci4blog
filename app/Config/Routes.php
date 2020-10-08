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


// $routes->setAutoRoute(false);
// , ['filter' => 'auth']

$routes->get('/logout', 'Admin::logout');
// $routes->match(['get', 'post'], '/create', 'Pages::create');

// $routes->get('/delete/$1', 'Dashboard::delete', ['filter' => 'auth']);
$routes->get('/dashboard', 'Dashboard::showpost', ['filter' => 'auth']);
$routes->match(['get', 'post'], '/create', 'Dashboard::create', ['filter' => 'auth']);


$routes->match(['get', 'post'], '/login', 'Admin::login');
$routes->match(['get', 'post'], '/register', 'Admin::register');
// $routes->match(['get', 'post'], '/create', 'Pages::create');

$routes->get('/', 'Pages::index');
$routes->get('/view/(:any)', 'Pages::view/$1');


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
