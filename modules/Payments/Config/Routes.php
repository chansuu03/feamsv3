<?php

$routes->group('admin/payments', ['namespace' => 'Modules\Payments\Controllers'], function($routes){
  $routes->get('/', 'Payments::index', ["filter" => "auth"]);
  $routes->match(['get', 'post'], 'add', 'Payments::add', ["filter" => "auth"]);
  $routes->match(['get', 'post'], 'edit/(:num)', 'Payments::edit/$1');
  $routes->get('delete/(:num)', 'Payments::delete/$1');
});
