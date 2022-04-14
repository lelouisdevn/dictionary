var inputField = $('#search-ajax');
  inputField.on('keydown', function(e){
    if (e.which == 13){
      var url = "/search?keyword=" + inputField.val();
      // window.open(url, '_blank').focus();
      window.location.href = url;
      inputField.val('');
    }
  })