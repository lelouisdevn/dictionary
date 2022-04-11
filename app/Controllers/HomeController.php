<?php

namespace App\Controllers;

class HomeController extends Controller
{
	// public function __construct()
	// {
	// 	if (!Guard::isUserLoggedIn()) {
	// 		redirect('/login');
	// 	}

	// 	parent::__construct();
	// }

	public function index()
	{
		// $this->sendPage('home');
		// $this->sendPage('home', ['contacts' => Guard::user()->contacts ]);
		$this->sendPage('homepage/home');
	}

	public function search(){
		$this->sendPage('search/search_content');
	}
}
