<?php

namespace App\Controllers;

use App\Controllers\Auth\LoginController;
use App\Models\User;
use App\Models\Account;
use App\Models\Bookmark;
use Illuminate\Database\Capsule\Manager as DB;
use Intervention\Image\Image;

Class ProfileController extends Controller {
    // hiển thị profile người dùng;
    public function showProfile(){
        if (isset($_SESSION['user'])){
            $this->sendPage('layouts/profile');
        }else {
            redirect('/');
        }
    }

    // hiển thị form cập nhật username;
    public function showInfo(){
        if (isset($_SESSION['user'])){
            $this->sendPage('profile/updateInfo');
        }
        else {
            redirect('/');
        }
    }

    // cập nhật username;
    public function updateInfo(){
        // cập nhật tên người dùng.
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['username'])) {
                $user = new User;
                $user = User::find($_SESSION['user']);
                $user->UserName = $_POST['username'];
                $user->save();
                
                redirect('/user/info/update');
            }
        }
    }

    public function showDeleteAccountForm(){
        // gửi form xác nhận xóa tài khoản: yêu cầu nhập email và mật khẩu.
        $this->sendPage('profile/deleteAccount');
    }

    public function deleteAccount(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['demail'];
            $pwd = $_POST['dpwd'];

            $id = Account::where('UserEmail', '=', $email)->first();

            $hashed_pwd = $id->UserPass;
            if (password_verify($pwd, $hashed_pwd)){
                $acc = Account::where('UserID', $id->UserID)->delete();
                $user = User::where('UserID', $id->UserID)->delete();
                if ($acc && $user){
                    // echo "<script>alert('Your account has been deleted!')</script>";
                    
                    unset($_SESSION['user']);
                    session_destroy();
                }
                redirect('/');
            }
        }
    }

    // hiển thị wordlist.
    public function showWordlist(){
        $dt = DB::table('bookmark')->where('UserID', $_SESSION['user'])->get();
        $this->sendPage('profile/wordlist', ['wordlist' => $dt]);
    }

    // cập nhật ảnh profile.
    public function updateProfilePicture(){
        // lấy file từ mảng files;
        $file =  $_FILES['filename']['name'];
        
        // base directory;
        $base_dir = "image/";
        
        // lấy tên file.
        $filename = substr($file, 0, strripos($file,'.'));
        // lấy phần mở rộng.
        $extension = substr($file, strripos($file, '.'));

        // tạo tên ảnh: userid . filename . random number . extension;
        $user_prof_picture = $_SESSION['user'] . $filename . rand(10000,99999) . $extension;

        // di chuyển đến base_directory;
        move_uploaded_file($_FILES['filename']['tmp_name'], $base_dir.$user_prof_picture);

        // cập nhật vào cơ sở dữ liệu;
        $data = [];
        $data['UserPicture'] = $user_prof_picture;
        DB::table('user')->where('UserID', $_SESSION['user'])->update($data);

        redirect('/profile');
    }

    public function removeFromWordlist(){
        $BookmarkID = $_POST['BookmarkID'];

        $bf = Bookmark::getLastBmID();

        Bookmark::where('BookmarkID', $BookmarkID)->delete();

        $af = Bookmark::getLastBmID();

        if ($af == $bf - 1){
            echo 1;
        }
    }
}