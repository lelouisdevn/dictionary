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
	public function createUser(array $data){
		$error = DB::table('account')->where('UserEmail', $data['UserEmail'])->first();
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
	public function checkCaptcha(){
		$status = 0;
			echo $_POST['captcha'];
			if($_SESSION['phrase'] == $_POST['captcha']){
				$status = 1;
				unset($_SESSION['phrase']);
			}else {
				$status = 0;
				unset($_SESSION['phrase']);
			}
		return $status;
	}

	public function signUp(){
		// tính userid và accountid;
		$user = new User;
		$acc = new Account;
		$UserID = $user->getLastUserID() + 1;
		$AccountID = $acc->getLastAccountID() + 1;

		$data = array();
		$data['UserID'] = $UserID;
		$data['UserName'] = $_POST['username'];
		$data['UserPass'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$data['UserRole'] = 0;
		$data['UserPicture'] = 'user.png';
		$data['UserEmail'] = $_POST['email'];
		$data['AccountID'] = $AccountID;

		// Create a new user with data stored in $data.
		
		if ($_POST['captcha'] == $_POST['captcha-str']){
			$this->createUser($data);
			if ($user->getLastUserID() == $UserID){
				$_SESSION['user'] = $UserID;
				redirect('/');	
			}
		}else {
			echo "<script>alert('Wrong captcha')</script>";
			$this->sendPage('homepage/home');
		}

		// $this->createUser($data);
		// if ($this->getLastUserID() == $UserID){
		// 	$dt = DB::table('user')->where('UserID', $this->getLastUserID())->first();
		// 	$_SESSION['user'] = $UserID;
		// 	$_SESSION['UserName'] = $dt->UserName;
		// 	$_SESSION['join'] = $dt->created_at;
		// 	$_SESSION['UserPicture'] = $dt->UserPicture;
		// 	redirect('/');
		// }

		// if ($this->getLastUserID() == $UserID){
		// 	echo "OKay";
		// }else {
		// 	echo "error";
		// }
		// $acc = DB::table('user')->join('account', 'user.UserID', '=', 'account.UserID')->get();
		// echo $acc;
	}
}
