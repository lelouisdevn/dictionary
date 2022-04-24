<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Illuminate\Database\Capsule\Manager as DB;
use App\SessionGuard as Guard;
 
class LoginController extends Controller
{
	// đăng nhập
	public function login(){
		// kiểm tra mật khẩu và email
		if (isset($_POST['mail']) && isset($_POST['pwd'])){
			$info = DB::table('account')->where('UserEmail', $_POST['mail'])->first();

			if ($info){
				// lấy hased password;
				$hashed_pwd = $info->UserPass;

				// kiểm tra mật khẩu với hàm password_verify.
				if (password_verify($_POST['pwd'], $hashed_pwd)){
					$_SESSION['user'] = $info->UserID;
					redirect("/");
				}else {
					$_SESSION['error'] = "Wrong email or password!";
					redirect('/');
				}
			}else {
				$_SESSION['error'] = "Account does not exsist";
				redirect('/');
			}
		}
	}

	// đăng xuất.
	public function logout() {
		if (isset($_SESSION['user'])){
			session_unset();
			session_destroy();
		}
		redirect('/');
	}
}
