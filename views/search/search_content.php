<?php $this->layout("layouts/default/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
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

<?php $this->stop() ?>