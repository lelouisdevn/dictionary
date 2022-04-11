<div class="row header">
            <div class="col-3" id="trademark1" style="font-size: 30px; font-family: monospace; cursor: pointer;">Atlanteans</div>
            <div class="col-9">
                <div class="row">
                    <div class="col-7" style="margin: auto 0;">
                      
                        <?php if (isset($_GET['word'])) { ?>
                          <input type="search" id="search-ajax" style="font-family: monospace;" class="form-control" value="<?php echo $_GET['word'] ?>" placeholder="Enter word to search...">
                        <?php }else{ ?>
                          <input type="search" id="search-ajax" style="font-family: monospace;" class="form-control" value="" placeholder="Enter word to search...">
                        <?php } ?>

                      
                    </div>

                    <div class="col-5 topbar">
                      <?php if (isset($_SESSION['user'])){ ?>
                        <p id="logout">Log out</p>
                        <p><a style="color: black; text-decoration: none;" href="/profile">Profile</a></p>
                      <?php }else { ?>
                        <p data-toggle="modal" data-target="#signInModal">Sign in</p>
                        <p data-toggle="modal" data-target="#signUpModal">Sign up</p>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>

<script>
  $('#logout').on('click', function(){
    window.location.href = "/user/logout";
  })
</script>