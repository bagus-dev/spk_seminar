<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('admin', ['filter' => 'role:admin'], function($routes) {
    $routes->group('dashboard', function($routes) {
        $routes->get('/', 'Admin\Dashboard::index');
        
        $routes->group('field_seminar', function($routes) {
            $routes->get('/', 'Admin\Dashboard::field_seminar');
            $routes->get('add', 'Admin\Dashboard::add_field_seminar');
            $routes->post('save', 'Admin\Dashboard::save_field_seminar');
            $routes->get('edit/(:segment)', 'Admin\Dashboard::edit_field_seminar/$1');
            $routes->put('update', 'Admin\Dashboard::update_field_seminar');
            $routes->delete('delete', 'Admin\Dashboard::delete_field_seminar');
        });

        $routes->group('seminar', function($routes) {
            $routes->get('/', 'Admin\Dashboard::seminar');
            $routes->get('add', 'Admin\Dashboard::add_seminar');
            $routes->post('save', 'Admin\Dashboard::save_seminar');
            $routes->get('edit/(:segment)', 'Admin\Dashboard::edit_seminar/$1');
            $routes->put('update', 'Admin\Dashboard::update_seminar');
            $routes->delete('delete', 'Admin\Dashboard::delete_seminar');
        });

        $routes->group('criteria', function($routes) {
            $routes->get('/', 'Admin\Dashboard::criteria');
            $routes->get('add', 'Admin\Dashboard::add_criteria');
            $routes->post('save', 'Admin\Dashboard::save_criteria');
            $routes->get('edit/(:segment)', 'Admin\Dashboard::edit_criteria/$1');
            $routes->put('update', 'Admin\Dashboard::update_criteria');
            $routes->delete('delete', 'Admin\Dashboard::delete_criteria');
        });

        $routes->group('profile', function($routes) {
            $routes->get('/', 'Admin\Dashboard::profile');
            $routes->post('basic/save', 'Admin\Dashboard::profile_basic_save');
            $routes->post('image/save', 'Admin\Dashboard::profile_image_save');
        });

        $routes->get('accounts', 'Admin\Dashboard::accounts');
        $routes->get('comprehension', 'Admin\Dashboard::comprehension');
    });
});

$routes->group('student', ['filter' => 'role:user'], function($routes) {
    $routes->group('dashboard', function($routes) {
        $routes->get('/', 'Student\Dashboard::index');

        $routes->group('participant', function($routes) {
            $routes->get('/', 'Student\Dashboard::participant');
            $routes->get('add', 'Student\Dashboard::add_participant');
            $routes->post('save', 'Student\Dashboard::save_participant');
            $routes->get('edit/(:segment)', 'Student\Dashboard::edit_participant/$1');
            $routes->put('update', 'Student\Dashboard::update_participant');
            $routes->delete('delete', 'Student\Dashboard::delete_participant');
        });

        $routes->group('comprehension', function($routes) {
            $routes->get('comprehension', 'Student\Dashboard::comprehension');
        });

        $routes->group('profile', function($routes) {
            $routes->get('/', 'Student\Dashboard::profile');
            $routes->post('basic/save', 'Student\Dashboard::profile_basic_save');
        });
    });
});

$routes->get('seminar', 'Student\Dashboard::getseminar');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
