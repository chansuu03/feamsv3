<?php

$routes->group('admin/transactions', ['namespace' => 'Modules\Transactions\Controllers'], function($routes){
  $routes->get('/', 'Transactions::index', ["filter" => "auth"]);
  $routes->match(['get', 'post'], 'add', 'Transactions::add', ["filter" => "auth"]);
  $routes->match(['get', 'post'], 'edit/(:num)', 'Transactions::edit/$1');
  $routes->get('delete/(:num)', 'Transactions::delete/$1');
});
