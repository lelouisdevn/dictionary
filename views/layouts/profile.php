<?php $this->layout("layouts/default/default", ["title" => APPNAME]) ?>

<?php $this->start("page"); ?>

<div class="row content profile">
          <div class="col-3">
            <div><img class="avt" src="<?php if (isset($_SESSION['UserPicture'])) { echo "/" . $_SESSION['UserPicture']; } ?>" alt=""></div>
          </div>
          <div class="col-9">
            <div class="profile-info">
              <div><?php if (isset($_SESSION['UserName'])) { echo $_SESSION['UserName']; } ?></div>
              <div><?php if (isset($_SESSION['user'])) { echo "User ID: " . $_SESSION['user']; } ?></div>
              <div><?php if (isset($_SESSION['Join'])) { echo "Join at: " . $_SESSION['Join']; } ?></div>
              <div><a id="fdialogue" class="btn btn-dark">Upload new user profile picture</a></div>
              <!-- form upload new user profile picture -->
              <form id="avt_upload_form" action="/profile/picture/update" method="POST" enctype="multipart/form-data">
                <input type="file" name="filename" id="file" style="display: none;">
              </form>
              <!-- end form -->
            </div>
          </div>
          <div class="col-3 sidebar">
            <div>
              <div><a href="/user/wordlist">Wordlist</a></div>
              <div><a href="/user/info/update">Update user information</a></div>
              <div><a href="/user/account/delete">Delete account</a></div>
              <div><a href="/user/logout">Log out</a></div>
            </div>
          </div>
          <div class="col-9">
            <?=$this->section("page-child")?>
          </div>
        </div>

<script>
  $('#fdialogue').on('click', function(){
    $('#file').trigger('click');
  })

  $("#file").change(function(){
    $('#avt_upload_form').submit();
  })
</script>

<?php $this->stop() ?>