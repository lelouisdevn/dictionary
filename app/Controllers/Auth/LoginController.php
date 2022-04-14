<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Illuminate\Database\Capsule\Manager as DB;
use App\SessionGuard as Guard;
 
class LoginController extends Controller
{
	public function login(){
		if (isset($_POST['mail']) && isset($_POST['pwd'])){
			$info = DB::table('account')->where('UserEmail', $_POST['mail'])->where('UserPass', $_POST['pwd'])->first();

			if ($info != null){
				$_SESSION['user'] = $info->UserID;
				$this->sendPage('/homepage/home');
			}


			
			// if (isset($_SESSION['user'])){
			// 	$dt = DB::table('user')->where('UserID', $_SESSION['user'])->first();
			// 	$_SESSION['UserName'] = $dt->UserName;
			// 	$_SESSION['UserPicture'] = $dt->UserPicture;
			// 	$_SESSION['Join'] = $dt->created_at;
			// 	redirect('/');
			// }else {
			// 	echo "<script>alert('Wrong email or password!');</script>";
			// 	$this->sendPage('/homepage/home');
			// }
		}
	}

	public function logout() {
		if (isset($_SESSION['user'])){
			session_unset();
			session_destroy();
		}
		redirect('/');
	}
}
