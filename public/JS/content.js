// Search page

  var ipa = document.getElementsByClassName('ukipa');
  var mwdef = document.getElementsByClassName('mword_def');
  var mword_example = document.getElementsByClassName('mword_example');

  // reset các giá trị.
  $('#search-ajax').on('keydown', function(e){
    if (e.which == 13){
      console.log($('#search-ajax').val());
      var word = $('#search-ajax').val();

      console.log(ipa);
      $('#mword').html("Searching....");
      $('#mword_meaning').empty();

      for (let i = 0; i<ipa.length; i++){
        $(ipa[i]).html('');
      }

      search(word);
    }
  })

  // kiểm tra xem từ cần tìm có tồn tại không
  // nếu từ không tồn tại, api trả về lỗi 404.
  function UrlExists(url) {
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    if (http.status != 404){
      return 0;
    }
    else {
      return 1;
    }
  }

  // tra từ.
  function search(word){
    url = "https://api.dictionaryapi.dev/api/v2/entries/en/" + word;
    console.log(url);
    var status = UrlExists(url);
    // nếu không có lỗi: 
    if (status == 0 ) {
      $.getJSON(`https://api.dictionaryapi.dev/api/v2/entries/en/${word}`, function(data){
        if (status == 0){
            for (let i = 0; i < data.length; i++){
                // $('#mword').html(data[i].word);
                $('#mword').html(word);
                for (let j = 0; j < data[i].phonetics.length; j++){
                  if (data[i].phonetics[j].text != ''){
                    $(ipa[j]).html(data[i].phonetics[j].text);
                    $('audio').prop('src', data[i].phonetics[j].audio);
                  }else {
                    $(ipa[j]).html('');
                  }
                }
      
                for (let k = 0; k < data[i].meanings[0].definitions.length; k++){
                  $('<div style="border-bottom: solid 1px black; margin: 20px 0;"><div class="mword_def"></div><div style="padding: 0 20px;"><div class="mword_example"></div></div></div>')
                  .appendTo('#mword_meaning');
                }
                
                // console.log(mwdef);
                for (let k = 0; k < data[i].meanings[0].definitions.length; k++){
                  if (data[i].meanings[0].definitions[k].example != ''){
                    // $('<i class="fa fa-circle"></i>').appendTo($(mword_example[k]));
                    $(mword_example[k]).html(data[i].meanings[0].definitions[k].example);
                  }else {
                    $(mword_example[k]).remove();
                  }
                  $(mwdef[k]).html(data[i].meanings[0].definitions[k].definition);
                }
            }

            
            // kiểm tra từ hiện tại có được người dùng like chưa
            // nếu có hiện đã like
            $.ajax({
              url: '/user/word/isLiked',
              type: 'post',
              data: { word:word },
              success:function(data){
                if (data){
                  $('#like').removeClass('fa-heart-o').addClass('fa-heart')
                }else {
                  $('#like').removeClass('fa-heart').addClass('fa-heart-o');
                }
              }
            })
        }
      });
    // nếu không tìm được từ -> hiển thị lỗi
    }else {
      $('#mword').html("No definitions");
    }
  }

  // phát audio phát âm.
  var volume = document.getElementsByClassName('fa-volume-up');
  var audio = document.getElementsByClassName('audio1');
  for (let i = 0; i< ipa.length; i++){
    var vl = volume[i];
    console.log(audio);
    $(vl).on('click', function(){
      // var audio1 = document.getElementById('audio1');
      // audio1.play();

      var pr = vl.parentElement.nextElementSibling;
      console.log(pr);

      pr.play();
    })
  }

  // khi reload trang, tra từ có trong url.
  window.onload = function(){
    var query = String(window.location.search);
    var word = parseInt(query.indexOf("="));
    var sub = query.substring(word + 1);
    
    search(sub);
  }


  // thêm từ vào wordlist
  $('#like').on('click', function(){
      console.log($('#mword').text());
      var word = $('#mword').text();
      $.ajax({
        url: '/user/add/wordlist',
        type: 'post',
        data: { word:word },
        success:function(data){
          // $('#mword').html(data);

          if ($('#like').hasClass('fa-heart-o')){ 
            $('#like').removeClass('fa-heart-o').addClass('fa-heart')
          }else {
            $('#like').removeClass('fa-heart').addClass('fa-heart-o');
          }
        }
      })
  })