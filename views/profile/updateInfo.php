<?php $this->layout("layouts/profile", ["title" => APPNAME]) ?>

<?php $this->start("page-child"); ?>

<form action="/user/info/update" method="post">
<div class="form-group">
        <p class="alert alert-info">You can make change to your username!</p>
    </div>
    <div class="form-group">
        <label for="">Username:</label>
        <input type="text" name="username" class="form-control" placeholder="Enter new username:...">
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Save changes</button>
    </div>
</form>

<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/content.css">
<link rel="stylesheet" href="/css/home.css">

<script src="/js/search.js"></script>
<?php $this->stop(); ?>
