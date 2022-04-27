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
              <?php }else { ?>
                <div style="margin: 20px; font-size: 25px;">Sign out your account</div>
                <div class="">
                  <div style="display: inline-block;">
                    <div><a style="color: black;" href="/user/logout"><i style="font-size: 100px;" class="fa fa-sign-out"></i></a></div>
                    <div><a style="color: black;" href="/user/logout">Sign out</a></div>
                  </div>
                </div>
              <?php } ?>
            </div>
        </div>

        <div class="row content wordof">
          <div class="col-6" style="background-color: #FEDE00;">
            <div class="wtitle">
              <div>Word of the day</div>
            </div>
            <div class="word">
              <div><a href="" id="todayword"></a></div>
            </div>
          </div>
          <div class="col-6">
            <div class="word_content">
              <div style="padding: 0 10px;" id="todaywcontent">
              
              </div>
            </div>
          </div>
        </div>

<link rel="stylesheet" href="/css/profile.css">
<link rel="stylesheet" href="/css/content.css">
<link rel="stylesheet" href="/css/home.css">

<script>
  // word of the day
  // tạo một mảng gồm các từ
  var word = Array("Metal", "Plant", "Water", "Fire", "Soil");
  // lấy ngẫu nhiên một từ nào đó; sử dụng API để tra cứu định nghĩa của từ vừa được chọn
  var item = word[Math.floor(Math.random()*word.length)];
  $.getJSON(`https://api.dictionaryapi.dev/api/v2/entries/en/${item}`, function(data){
    var definition = data[0].meanings[0].definitions[0].definition;
    // console.log(definition);
    $('#todayword').html(item).css("color", 'black');
    $('#todayword').prop('href', '/search?keyword=' + item);
    $('#todaywcontent').html(definition);
  });

  // hiển thị lỗi (tk không tồn tại, sai mật khẩu/email) bằng alert (JS).
  window.onload = function(){
    $.ajax({
      type: 'POST',
      // HomeController;
      url: '/checkerror',
      success:function(data){
        if (data != ''){
          alert(data);
        }
      }
    });
  }

</script>

<?php $this->stop() ?>