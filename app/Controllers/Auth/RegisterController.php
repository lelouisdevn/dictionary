<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Models\Account;
use App\Controllers\Controller;
// use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use App\SessionGuard as Guard;
use Illuminate\Database\Capsule\Manager as DB;

class RegisterController extends Controller
{
	public function getLastUserID(){
		// Get the last UserID.
		$id = User::max('UserID');

		$UserID = 0;
		if ($id != null){
			$UserID = $id;
		}else {
			$UserID = 0;
		}
		return $UserID;
	}
	public function getLastAccountID (){
		// Get the last AccountID
		$id = Account::max('AccountID');

		$AccountID = 0;
		if ($id != null){
			$AccountID = $id;
		}else {
			$AccountID = 0;
		}
		return $AccountID;
	}
	public function createUser(array $data){
		$error = DB::table('account')->where('UserEmail', $data['UserEmail'])->get();
		if (!$error){
			User::create([
				'UserID' => $data['UserID'],
				'UserName' => $data['UserName'],
				'UserRole' => $data['UserRole']
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
		if ($_SERVER['REQUEST_METHOD']  == 'POST'){
			if(PhraseBuilder::comparePhrases($_SESSION['phrase'], $_POST['captcha'])){
				$status = 1;
			}else {
				$status = 0;
			}
		}
		return $status;
	}

	public function signUp(){
		// Calculate the AccountID and UserID for new user.
		$UserID = $this->getLastUserID() + 1;
		$AccountID = $this->getLastAccountID() + 1;

		$data = array();
		$data['UserID'] = $UserID;
		$data['UserName'] = $_POST['username'];
		$data['UserPass'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$data['UserRole'] = 0;
		$data['UserEmail'] = $_POST['email'];
		$data['AccountID'] = $AccountID;

		// Create a new user with data stored in $data.
		// if ($this->checkCaptcha() == 1){
		// 	$this->createUser($data);
		// 	$_SESSION['user'] = $UserID;
		// 	$this->sendPage('homepage/home');
		// }else {
		// 	echo "<script>alert('Wrong captcha')</script>";
		// 	redirect('/');
		// }

		$this->createUser($data);
		if ($this->getLastUserID() == $UserID){
			$_SESSION['user'] = $UserID;
			redirect('/');
		}

		// if ($this->getLastUserID() == $UserID){
		// 	echo "OKay";
		// }else {
		// 	echo "error";
		// }
		// $acc = DB::table('user')->join('account', 'user.UserID', '=', 'account.UserID')->get();
		// echo $acc;
	}
}
