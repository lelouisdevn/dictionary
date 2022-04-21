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
$router->post('/user/signup', '\App\Controllers\Auth\RegisterController@signUp');

//Profile

// hiển thị profile
$router->get('/profile', '\App\Controllers\ProfileController@showProfile');

// cập nhật profile picture
$router->post('/profile/picture/update', 'App\Controllers\ProfileController@updateProfilePicture');

// hiển thị form cập nhật username:
$router->get('/user/info/update', '\App\Controllers\ProfileController@showInfo');
// cập nhật username;
$router->post('/user/info/update', '\App\Controllers\ProfileController@updateInfo');


// hiển thị form xóa tài khoản
$router->get('/user/account/delete', '\App\Controllers\ProfileController@showDeleteAccountForm');

// hiển thị wordlist của user;
$router->get('/user/wordlist', '\App\Controllers\ProfileController@showWordlist');

// home
$router->get('/', '\App\Controllers\HomeController@index');
$router->get('/home', '\App\Controllers\HomeController@index');

// search
$router->get('/search', '\App\Controllers\HomeController@search');

// nhấn nút like để thêm vào wordlist
$router->post('/user/add/wordlist', '\App\Controllers\Search@addToWordlist');

// kiểm tra từ đã được like chưa để hiển thị icon like thích hơp.
$router->post('/user/word/isLiked', '\App\COntrollers\Search@wordIsLiked');

// 404 error page.
$router->set404('\App\Controllers\Controller@sendNotFound');

$router->run();