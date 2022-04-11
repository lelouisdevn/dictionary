<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require __DIR__ . '/../bootstrap.php';

define('APPNAME', 'My Phonebook');

session_start();

$router = new \Bramus\Router\Router();

// Auth routes
$router->get('/user/logout', '\App\Controllers\Auth\LoginController@logout');
$router->post('/user/login', '\App\Controllers\Auth\LoginController@login');
$router->post('user/signup', '\App\Controllers\Auth\RegisterController@signUp');

//Profile 
$router->get('/profile', '\App\Controllers\ProfileController@showProfile');
$router->post('/profile/picture/update', 'App\Controllers\ProfileController@updateProfilePicture');
$router->get('/user/info/update', '\App\Controllers\ProfileController@showInfo');
$router->post('/user/info/update', '\App\Controllers\ProfileController@updateInfo');
$router->get('/user/account/delete', '\App\Controllers\ProfileController@showDeleteAccountForm');
$router->get('/user/wordlist', '\App\Controllers\ProfileController@showWordlist');

// Contact routes
$router->get('/', '\App\Controllers\HomeController@index');
$router->get('/home', '\App\Controllers\HomeController@index');

$router->get('/search', '\App\Controllers\HomeController@search');

$router->set404('\App\Controllers\Controller@sendNotFound');

$router->run();