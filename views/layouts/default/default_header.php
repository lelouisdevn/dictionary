<div class="row header">
            <div class="col-3" style="font-size: 30px; font-family: monospace; cursor: pointer;">
              <a style="color: black; text-decoration: none;" href="/">Atlanteans</a>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-7" style="margin: auto 0;">
                      
                        <?php if (isset($_GET['word'])) { ?>
                          <form action="/search" method="get" id="search-pf">
                            <input type="search" id="search-ajax" name="keyword" style="font-family: monospace;" class="form-control" value="<?php echo $_GET['word'] ?>" placeholder="Enter word to search..." >
                          </form>
                        <?php }else{ ?>
                          <form id="search-pf" action="/search" method="get"></form>
                            <input type="search" id="search-ajax" name="keyword" style="font-family: monospace;" class="form-control" value="" placeholder="Enter word to search...">
                          </form>
                        <?php } ?>
                      
                    </div>

                    <div class="col-5 topbar">
                      <?php if (isset($_SESSION['user'])){ ?>
                        <p><a style="color: black; text-decoration: none;" href="/user/logout">Log out</a></p>
                        <p><a style="color: black; text-decoration: none;" href="/profile">Profile</a></p>
                      <?php }else { ?>
                        <p data-toggle="modal" data-target="#signInModal">Sign in</p>
                        <p data-toggle="modal" data-target="#signUpModal">Sign up</p>
                      <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- <script src="/js/content.js"></script> -->