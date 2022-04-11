<?php

namespace App\Controllers;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as DB;

Class ProfileController extends Controller {
    public function showProfile(){
        if (isset($_SESSION['user'])){
            $dt = DB::table('user')->where('UserID', $_SESSION['user'])->first();
            $_SESSION['UserPicture'] = $dt->UserPicture;
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if (isset($_POST['username'])) {
                $user = new User;
                $user = User::find($_SESSION['user']);
                $user->UserName = $_POST['username'];
                $user->save();

                $_SESSION['UserName'] = $_POST['username'];
                redirect('/user/info/update');
            }
        }
    }

    public function showDeleteAccountForm(){
        $this->sendPage('profile/deleteAccount');
    }

    public function showWordlist(){
        $this->sendPage('profile/wordlist');
    }

    public function updateProfilePicture(){
        $file =  $_FILES['filename']['name'];
        
        $base_dir = "image/";
        
        $filename = substr($file, 0, strripos($file,'.'));
        $extension = substr($file, strripos($file, '.'));

        // echo $filename;
        // echo $extension;

        $ProfilePicture = $base_dir . $filename . rand(10000,99999) . $extension;
        // echo $ProfilePicture;

        move_uploaded_file($_FILES['filename']['tmp_name'], $ProfilePicture);

        $data = [];
        $data['UserPicture'] = $ProfilePicture;
        DB::table('user')->where('UserID', $_SESSION['user'])->update($data);

        redirect('/profile');
    }
}

