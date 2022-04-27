<?php $this->layout("layouts/profile", ["title" => APPNAME]) ?>

<?php $this->start("page-child"); ?>

<!-- form xác thực xóa tài khoản -->
<form action="/user/account/delete" method="post">
    <div class="form-group">
        <p class="alert alert-danger">You are going to delete your account! This action cannot be undone!</p>
    </div>
    <div class="form-group">
        <label for="">Email:</label>
        <input type="email" class="form-control" placeholder="Enter your email:..." name="demail">
    </div>
    <div class="form-group">
        <label for="">Password:</label>
        <input type="password" class="form-control" placeholder="Enter your password:..." name="dpwd">
    </div>
    <div class="form-group">
        <button class="btn btn-danger">Delete account</button>
    </div>
</form>
<!-- end form -->

<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/content.css">
<link rel="stylesheet" href="/css/home.css">

<?php $this->stop(); ?>