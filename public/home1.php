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
    <link rel="stylesheet" href="./CSS/content.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container" >
        <div class="row header">
            <div class="col-3" id="trademark1" style="font-size: 30px; font-family: monospace;">Atlanteans</div>
            <div class="col-9">
                <div class="row">
                    <div class="col-7" style="margin: auto 0;">
                      
                        <?php if (isset($_GET['word'])) { ?>
                          <input type="search" id="search-ajax" style="font-family: monospace;" class="form-control" value="<?php echo $_GET['word'] ?>" placeholder="Enter word to search...">
                        <?php } ?>
                      
                    </div>

                    <div class="col-5 topbar">
                      <p data-toggle="modal" data-target="#myModal">Sign in</p>
                      <p>Sign up</p>
                      <p>Support</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header -->



        <!-- content starts here -->
        <div class="row content">
          <div class="content-body">

            <div class="col-md-12">
              <div>English dictionary</div>
              <hr>
            </div>
            <!-- The word searched -->
            <div class="col-md-12">
              <div class="mword"><span id="mword">Hello</span> <span>Noun</span> <span id="like" class="fa fa-heart-o"></span>
              </div>
            </div>

            <div class="col-md-12 mword_pronunciation">
                <div>
                  <span>
                    <span>
                      <i>UK</i> 
                      <i class="fa fa-volume-up"></i> 
                      <i class="ukipa"></i>
                    </span>
                    <audio class="audio" src=""></audio>
                  </span>
                  <span>
                    <span>
                    <i>US</i> <i class="fa fa-volume-up"></i> <i class="ukipa"></i>
                    </span>
                    <audio src=""></audio>
                  </span>
                </div>
            </div>

            <div class="col-md-12">
              <hr>
            </div>


            <!-- foreach to fetch all data -->
            <div class="col-12-md mword_meaning">

              <div  id="mword_meaning">

              </div>
              <!-- <div class="mword_def">
                Definition here.
              </div> -->

              <!-- foreach all example -->
              <!-- <div style="padding: 0 20px;">
                <div class="mword_example">
                  <i class="fa fa-circle"></i> Example here.
                </div>
              </div> -->
            </div>
          </div>







        </div>
        <!-- ends content -->



        <!-- footer -->
        <div class="row footer">
            <div class="col-3">Atlanteans&trade;</div>
            <div class="col-9">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-3">
                        <ul>Information
                            <li>Stores</li>
                            <li>Shops</li>
                            <li>Boutiques</li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <ul>Polices
                            <li>Cookies using</li>
                            <li>End user's</li>
                            <li>Copyright</li>

                        </ul>
                    </div>
                    <div class="col-3">
                        <ul>Socials
                            <li>Twitter</li>
                            <li>Facebook</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12" style="padding: 10px 10px;">
                2022 &copy; Ngô Trần Vĩnh Thái.
            </div>
        </div>
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
                  <input type="text" name="" value="" class="form-control" placeholder="Enter email:...">
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

<script src="./JS/content.js"></script>
</html>