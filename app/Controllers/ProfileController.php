<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Bookmark;
use Illuminate\Database\Capsule\Manager as DB;

Class ProfileController extends Controller {
    public function showProfile(){
        if (isset($_SESSION['user'])){
            $this->sendPage('layouts/profile');
        }else {
            redirect('/');
        }
    }

    public function showInfo(){
        if (isset($_SESSION['user'])){
            $this->sendPage('profile/updateInfo');
        }
        else {
            redirect('/');
        }
    }

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

    public function showWordlist(){
        $dt = DB::table('bookmark')->where('UserID', $_SESSION['user'])->get();
        $this->sendPage('profile/wordlist', ['wordlist' => $dt]);
    }

    public function updateProfilePicture(){
        // lấy file từ mãng files;
        $file =  $_FILES['filename']['name'];
        
        // base directory;
        $base_dir = "image/";
        
        $filename = substr($file, 0, strripos($file,'.'));
        $extension = substr($file, strripos($file, '.'));

        // tạo tên ảnh: userid . filename . random number . extension;
        $user_prof_picture = $_SESSION['user'] . $filename . rand(10000,99999) . $extension;
        // echo $ProfilePicture;

        // di chuyển đến base_directory;
        move_uploaded_file($_FILES['filename']['tmp_name'], $base_dir.$user_prof_picture);

        // cập nhật vào cơ sở dữ liệu;
        $data = [];
        $data['UserPicture'] = $user_prof_picture;
        DB::table('user')->where('UserID', $_SESSION['user'])->update($data);

        redirect('/profile');
    }
}