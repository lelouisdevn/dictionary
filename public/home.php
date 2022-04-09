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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <?php include('./captcha.php'); ?>
    <div class="container" >
        
    <?php include('../partials/header.php'); ?>
        <!-- <div class="row">
            div.
        </div> -->
        <div class="row search-part">
            <div class="trademark col-12" id="trademark">
                Atlanteans
            </div>
            <div class="search-bar">
                <input type="search" id="search" class="" placeholder="Enter word to search....">
            </div>
        </div>


        <div class="row content">
            <div class="col-6">
              <div style="margin: 20px; font-size: 30px; ">THE BEST DICTIONARY ON EARTH!</div>
                <div class="tbl">
                  <ul>
                    <li><a href=""><i>EN-FR:</i> English -> French</a></li>
                    <li><a href=""><i>EN-SP:</i> English -> Spanish</a></li>
                    <li><a href=""><i>FR-EN:</i> French -> English</a></li>
                    <li><a href=""><i>SP-EN:</i> Spanish -> English</a></li>
                    <li><a href=""><i>EN-GM:</i> English -> German</a></li>
                    <li><a href=""><i>EN-CN:</i> English -> Chinese</a></li>
                    <li><a href=""><i>EN-VN:</i> English -> Vietnamese</a></li>
                  </ul>
                </div>
            </div>
            <div class="col-6" style="text-align: center;">

              <!-- If user has logged in, do not display this section -->
              <div style="margin: 20px; font-size: 25px;">Login to your account</div>
              <div class="">
                <!-- <div>EXPLORE THE BEST DICTIONARY ON EARTH!</div> -->
                <div style="display: inline-block;">
                  <div><i style="font-size: 100px;" class="fa fa-user" data-toggle="modal" data-target="#myModal"></i></div>
                  <div>Sign in</div>
                </div>
                <div style="margin: 0 20px; display: inline-block;">OR</div>
                <div style="display: inline-block;">
                  <div><i style="font-size: 100px;" class="fa fa-user-plus"></i></div>
                  <div>Sign up</div>
                </div>
              </div>
              <!-- End section -->

            </div>
        </div>

        <div class="row content wordof">
          <div class="col-6" style="background-color: #FEDE00;">
            <div class="wtitle">
              <div>Word of the day</div>
            </div>
            <div class="word">
              <div>Sucker</div>
            </div>
          </div>
          <div class="col-6">
            <div class="word_content">
              <div style="padding: 0 10px;">
                Something to explain the word here...
              Something to explain the word here...
              Something to explain the word here...
              </div>
            </div>
          </div>
        </div>

        <?php include('../partials/footer.php'); ?>
    </div>



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
              <form class="" action="index.html" method="post">
                <div class="form-group">
                  <label for="">Email:</label>
                  <input type="search" name="" value="" class="form-control" placeholder="Enter email:...">
                </div>

                <div class="form-group">
                  <label for="">Password:</label>
                  <input type="text" name="" value="" class="form-control" placeholder="Enter password:...">
                </div>

                <!-- <div class="form-group form-check">
                  <input type="checkbox" name="" value="" class="form-check-input">
                  <label class="form-check-label">Ghi nhớ tôi</label>
                </div> -->

                <div class="form-group">
                  <label for="">Captcha:</label>
                  <div style="margin: 10px 0;"><img src="<?php echo $builder->inline(); ?>" alt="Captcha"></div>
                  <input type="text" class="form-control" placeholder="Verify the captcha:...">
                </div>

                <div class="form-group">
                  <button type="submit" name="button" class="btn btn-primary btn-block">Log in</button>
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
</body>


<script>
  var inputField = $('#search');
  inputField.on('keydown', function(e){
    if (e.which == 13){
      var url = "/home1.php?word=" + inputField.val();
      window.open(url, '_blank').focus();
      inputField.val('');
    }
  })
</script>
</html>