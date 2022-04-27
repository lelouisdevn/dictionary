<?php $this->layout("layouts/default/default", ["title" => APPNAME]) ?>

<?php $this->start("page"); ?>
<?php 
  use Illuminate\Database\Capsule\Manager as DB;

  $dt = DB::table('user')->where('UserID', $_SESSION['user'])->first();
  // echo $dt->UserID;
?>
<div class="row content profile">
          <?php if ($dt) { ?>
          <div class="col-3">
            <!-- user profile picture -->
            <div><img class="avt" src="/image/<?=$dt->UserPicture?>" alt=""></div>
          </div>
          <?php } ?>
          <?php if ($dt) { ?>
          <div class="col-9">
            <div class="profile-info">
              <div><?=$dt->UserName?></div>
              <div><?="User ID: " . $dt->UserID?></div>
              <div><?="Join at: " . $dt->created_at?></div>
              <div><a id="fdialogue" class="btn btn-dark">Upload new user profile picture</a></div>
              <!-- form upload new user profile picture -->
              <form id="avt_upload_form" action="/profile/picture/update" method="POST" enctype="multipart/form-data">
                <input type="file" name="filename" id="file" style="display: none;">
              </form>
              <!-- end form -->
            </div>
          </div>
          <?php } ?>
          <div class="col-3 sidebar">
            <div>
              <div>
                <a href="/user/wordlist">Wordlist
                  <!-- <span class="badge badge-light"><i class="fa fa-book"></i> </span> -->
                </a>
              </div>
              <div>
                <a href="/user/info/update">Update user information
                  <!-- <span class="badge badge-light"><i class="fa fa-info"></i></span> -->
                </a>
              </div>
              <div>
                <a href="/user/account/delete">Delete account
                  <!-- <span class="badge badge-light"><i class="fa fa-cog"></i></span> -->
                </a>
              </div>
              <div>
                <a href="/user/logout">Log out
                  <!-- <span class="badge badge-light"><i class="fa fa-sign-out"></i></span> -->
                </a>
              </div>
            </div>
          </div>
          <div class="col-9">
            <?=$this->section("page-child")?>
          </div>
        </div>

<script>
  // Click vào button "update profile picture" để mở hộp thoại chọn file.
  $('#fdialogue').on('click', function(){
    $('#file').trigger('click');
  })
  // Khi chọn 1 file nào đó (trường input thay đổi) => submit form có ID là file.
  $("#file").change(function(){
    $('#avt_upload_form').submit();
  })
</script>

<script src="/js/content.js"></script>
<script src="/js/search.js"></script>


<?php $this->stop() ?>