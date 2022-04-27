<?php

namespace App\Controllers;

class HomeController extends Controller
{
	// điều hướng đến trang chủ khi người dùng gõ
	// dictionary.localhost.
	public function index() {
		$this->sendPage('homepage/home');
	}

	
	// trả kết quả tìm kiếm ở trang search_content;
	public function search(){
		$this->sendPage('search/search_content');
	}

	// kiểm tra lỗi khi người dùng đăng nhập.
	public function checkerror(){
		if (isset($_SESSION['error'])){
			$error = $_SESSION['error'];
			unset($_SESSION['error']);
			echo $error;
		}
	}
}
