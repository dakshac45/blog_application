<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::index');
$routes->get('blog/create', 'Blog::create');
$routes->post('blog/create', 'Blog::create');
$routes->get('blog/(:segment)', 'Blog::post/$1');
$routes->get('blog-list', 'Pages::showme/blog_list');
$routes->get('(:any)', 'Pages::showme/$1');

// $routes->get('/', 'Pages::index');
// $routes->get('blog/create', 'Blog::create');
// $routes->get('blog/(:any)', 'Blog::post/$1');
// $routes->get('(:any)','Pages::showme/$1');
// $routes->post('blog/create', 'Blog::create');
// $routes->get('pages/showme/blog_list', 'Pages::showme/blog_list');
//$routes->get('pages/', 'Pages::index');
//$routes->get('pages/showme', 'Pages::showme');
//$routes->get('pages/showme/(:any)', 'Pages::showme/$1');

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
