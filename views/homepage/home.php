<?php $this->layout("layouts/home/home_layout", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>

<div class="row search-part">
            <div class="trademark col-12" id="trademark">
                Atlanteans
            </div>
            <div class="search-bar">
                <form action="/search" method="get">
                  <input type="search" id="search" class="" name="keyword" placeholder="Enter word to search....">
                </form>
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

              <?php if (!isset($_SESSION['user'])){ ?>
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
              <?php } ?>

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

<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/content.css">
<link rel="stylesheet" href="/css/home.css">
<?php $this->stop() ?>