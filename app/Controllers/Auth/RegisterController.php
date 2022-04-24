<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Models\Account;
use App\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\SessionGuard as Guard;
use Illuminate\Database\Capsule\Manager as DB;


class RegisterController extends Controller
{	
	// tạo người dùng với thông tin lưu trong mảng $data;
	public function createUser(array $data){
		$error = DB::table('account')->where('UserEmail', $data['UserEmail'])->first();
		// nếu email đã tồn tại -> báo lỗi.
		// ngược lại, thêm người dùng mới vào hệ thống.
		if (!$error){
			User::create([
				'UserID' => $data['UserID'],
				'UserName' => $data['UserName'],
				'UserRole' => $data['UserRole'],
				'UserPicture' => $data['UserPicture']
			]);
	
			Account::create([
				'UserID' => $data['UserID'],
				'UserEmail' => $data['UserEmail'],
				'UserPass' => $data['UserPass'],
				'AccountID' => $data['AccountID']
			]);
		}else {
			echo "<script>alert('Existed email!');</script>";
			$this->sendPage('homepage/home');
		}
	}

	// không còn sử dụng.
	// public function checkCaptcha(){
	// 	$status = 0;
	// 		echo $_POST['captcha'];
	// 		if($_SESSION['phrase'] == $_POST['captcha']){
	// 			$status = 1;
	// 			unset($_SESSION['phrase']);
	// 		}else {
	// 			$status = 0;
	// 			unset($_SESSION['phrase']);
	// 		}
	// 	return $status;
	// }

	// hàm đăng ký thành viên.
	public function signUp(){
		// tính userid và accountid;
		$user = new User;
		$acc = new Account;
		$UserID = $user->getLastUserID() + 1;
		$AccountID = $acc->getLastAccountID() + 1;

		// lưu thông tin người dùng nhập ở form -> lưu vào mảng data;
		$data = array();
		$data['UserID'] = $UserID;
		$data['UserName'] = $_POST['username'];
		$data['UserPass'] = password_hash($_POST['password'], PASSWORD_DEFAULT); //sử dụng hàm băm để bảo mật mật khẩu.
		$data['UserRole'] = 0;
		$data['UserPicture'] = 'user.png';
		$data['UserEmail'] = $_POST['email'];
		$data['AccountID'] = $AccountID;

		// Create a new user with data stored in $data.
		// check if user entered the correct captcha.
		if ($_POST['captcha'] == $_POST['captcha-str']){
			$this->createUser($data);
			if ($user->getLastUserID() == $UserID){ //kiểm tra lưu thành công chưa.
				$_SESSION['user'] = $UserID;
				redirect('/');	
			}
		}else { //báo mã captcha đã được nhập sai.
			echo "<script>alert('Wrong captcha')</script>"; 
			$this->sendPage('homepage/home');
		}
	}
}
