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
$routes->get('/', 'Pager::halo');
$routes->get('/print', 'Cetak::print');
$routes->get('/pager/print', 'Pager::print');
$routes->get('/masuk/print', 'Masuk::print');
$routes->get('/gaji/gaji', 'Gaji::gaji');
$routes->get('/masuk/mate', 'Masuk::mate');
$routes->get('/keluar/kate', 'Keluar::kate');
// $routes->get('/leka/print', 'Masuk::print');

$routes->get('/pegawai/create', 'Pegawai::create');
$routes->get('/leka/create', 'Leka::create');
$routes->get('/gaji/create', 'Gaji::create');
$routes->get('/masuk/create', 'Masuk::create');
$routes->get('/keluar/create', 'Keluar::create');

$routes->get('/leka/(:segment)', 'Leka::detail/$1');
$routes->get('/leka/edit/(:segment)', 'Leka::edit/$1');
$routes->delete('/leka/(:num)', 'Leka::delete/$1');
$routes->get('/leka/(:any)', 'Leka::detail/$1');

$routes->get('/keluar/(:segment)', 'Keluar::detail/$1');
$routes->get('/keluar/edit/(:segment)', 'Keluar::edit/$1');
$routes->delete('/keluar/(:num)', 'Keluar::delete/$1');
$routes->get('/keluar/(:any)', 'Keluar::detail/$1');

$routes->get('/masuk/(:segment)', 'Masuk::detail/$1');
$routes->get('/masuk/edit/(:segment)', 'Masuk::edit/$1');
$routes->delete('/masuk/(:num)', 'Masuk::delete/$1');
$routes->get('/masuk/(:any)', 'Masuk::detail/$1');

$routes->get('/gaji/(:segment)', 'Gaji::detail/$1');
$routes->get('/gaji/edit/(:segment)', 'Gaji::edit/$1');
$routes->delete('/gaji/(:num)', 'Gaji::delete/$1');
$routes->get('/gaji/(:any)', 'Gaji::detail/$1');

$routes->get('/pegawai/(:segment)', 'Pegawai::detail/$1');
$routes->get('/pegawai/edit/(:segment)', 'Pegawai::edit/$1');
$routes->delete('/pegawai/(:num)', 'Pegawai::delete/$1');
$routes->get('/pegawai/(:any)', 'Pegawai::detail/$1');


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
