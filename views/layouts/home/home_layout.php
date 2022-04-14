<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dictionary</title>

    <!-- Bootstrap css & js -->
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./CSS/home.css">
    <link rel="stylesheet" href="./css/content.css">
    <script src="./js/nav.js"></script>

    <script src="./js/content.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/animate.css" rel="stylesheet">
</head>
<body>

    
    <div class="container" >
        <?php include('captcha.php') ?>
        <?php include('home_header.php'); ?>
        <!-- <div class="row">
            div.
        </div> -->
        <?=$this->section("page")?>

        <?php include('home_footer.php'); ?>

        <!-- login modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header text-center d-block">
              <button type="button" name="button" class="close" data-dismiss="modal" style="position: absolute; right: 10px;">&times;</button>
              <!-- <h2 class="modal-title"> <i class="fa fa-lock"></i> Log in </h2> -->
              <h3 style="font-family: monospace;">Atlanteans</h3>
              <h5>Log in</h5>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form class="" method="POST" action="/user/login">
                <div class="form-group">
                  <p>
                    
                  </p>
                </div>
                <div class="form-group">
                  <label for="">Email:</label>
                  <input id="email" type="text" name="mail" value="" class="form-control" placeholder="Enter email:...">
                </div>

                <div class="form-group">
                  <label for="">Password:</label>
                  <input id="pass" type="password" name="pwd" value="" class="form-control" placeholder="Enter password:...">
                </div>

                <!-- <div class="form-group form-check">
                  <input type="checkbox" name="" value="" class="form-check-input">
                  <label class="form-check-label">Ghi nhớ tôi</label>
                </div> -->

                <div class="form-group">
                  <button type="submit" id="login" name="button" class="btn btn-primary btn-block">Log in</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger mr-auto" data-dismiss="modal">
                <i class="fa fa-times"> Cancel</i>
              </button>
              <div class="text-right">
                <div>Don't have an account? <a href="#">Register</a></div>
                <div>Forgot <a href="#">password</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end login modal -->

    <!-- signUp modal -->
    <div class="modal fade" id="signUpModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header text-center d-block">
              <button type="button" name="button" class="close" data-dismiss="modal" style="position: absolute; right: 10px;">&times;</button>
              <!-- <h2 class="modal-title"> <i class="fa fa-lock"></i> Log in </h2> -->
              <h3 style="font-family: monospace;">Atlanteans</h3>
              <h5>Sign up</h5>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form class="" action="/user/signup" method="post">

                <div class="form-group">
                  <label for="">Username :</label>
                  <input type="text" name="username" value="" class="form-control" placeholder="Enter username:...">
                </div>

                <div class="form-group">
                  <label for="">Email:</label>
                  <input type="text" name="email" value="" class="form-control" placeholder="Enter email:...">
                </div>

                <div class="form-group">
                  <label for="">Password:</label>
                  <input type="password" name="password" value="" class="form-control" placeholder="Enter password:...">
                </div>

                <!-- <div class="form-group form-check">
                  <input type="checkbox" name="" value="" class="form-check-input">
                  <label class="form-check-label">Ghi nhớ tôi</label>
                </div> -->
                <div class="form-group">
                  <label for="">Captcha:</label>
                  <img src="<?php echo $builder->inline(); ?>" alt="Captcha">
                  <input style="margin-top: 5px;" type="text" class="form-control" placeholder="Captcha:...." name="captcha">
                </div>
                <div class="form-group">
                  <button type="submit" name="button" class="btn btn-primary btn-block">Sign up</button>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger mr-auto" data-dismiss="modal">
                <i class="fa fa-times"> Cancel</i>
              </button>
              <div class="text-right">
                <div>Don't have an account? <a href="#">Register</a></div>
                <div>Forgot <a href="#">password</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end signup modal -->



    
</body>


<?=$this->section("page_specific_js")?>
<script>
  // var inputField = $('#search');
  // inputField.on('keydown', function(e){
  //   if (e.which == 13){
  //     var url = "/search?keyword=" + inputField.val();
  //     // window.open(url, '_blank').focus();
  //     window.location.href= url;
  //     inputField.val('');
  //   }
  // })

  $('#trademark').on('click', function(){
    window.location.href = '/';
  })

  // $('#login').on('click', function(){
  //   var email = $('#email').val();
  //   var pwd = $('#pass').val();

  //   $.ajax({
  //     method: 'POST',
  //     route: '/user/login',
  //     data: {email:email, passwd:pwd},
  //     success:function(data){
  //       alert("hello")
  //     }
  //   })
  // })
</script>
</html>
