// Search page

  var ipa = document.getElementsByClassName('ukipa');
  var mwdef = document.getElementsByClassName('mword_def');
  var mword_example = document.getElementsByClassName('mword_example');


  $('#search-ajax').on('keyup', function(e){
    if (e.which == 13){
      console.log($('#search-ajax').val());
      var word = $('#search-ajax').val();

      
      
      console.log(ipa);
    //   $(".mword").html("No definitions found!");
      
      $('#mword_meaning').empty();

      for (let i = 0; i<ipa.length; i++){
        $(ipa[i]).html('');
      }

      search(word);
    }
  })

  function search(word){
    $.getJSON(`https://api.dictionaryapi.dev/api/v2/entries/en/${word}`, function(data){
        if (data[0].hasOwnProperty('word')){
            for (let i = 0; i < data.length; i++){
                $('#mword').html(data[i].word);
                for (let j = 0; j < data[i].phonetics.length; j++){
                  if (data[i].phonetics[j].text != ''){
                    $(ipa[j]).html(data[i].phonetics[j].text);
                    $('audio').prop('src', data[i].phonetics[j].audio);
                  }else {
                    $(ipa[j]).html('');
                  }
                  
                  // $('.usipa').html(data[i].phonetics[j].text);
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
        }else{
            $('.mword').html("No definition");
        }
    });
  }

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

  window.onload = function(){
    var query = String(window.location.search);
    var word = parseInt(query.indexOf("="));
    var sub = query.substring(word + 1);
    console.log(sub);

    search(sub);
  }

  $('#like').on('click', function(){
      console.log($('#mword').text());
  })