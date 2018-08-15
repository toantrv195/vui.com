//load homepage and load video
$(document).ready(function() {
    //load home page
    var page = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });

    function loadMoreData(page){
      $.ajax({ 
            url: '?page=' + page,
            type: "get",
            beforeSend: function()
            {
                $('.ajax-load').show();
            }
        })
        .done(function(data)
        {
            if(data.html == " "){
                $('.ajax-load').html("No more records found");
                return;
            }
            $('.ajax-load').hide();
            $("#post-data").append(data.html);
             FB.XFBML.parse();
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
              alert('server not responding...');
        });
    }
    
    //load more video
    var page = 1;
    $(window).scroll(function() {
      if ($(window).scrollTop + $(window).height() >= $(document).height()) {
         page++;
         loadMoreDataVideo(page);
      }
    });

    function loadMoreDataVideo(page) {
      $.ajax({
          url: '?page=' +page,
          type: 'GET ',
          beforeSend: function()
          {
            $('.ajax-load').show('3000');
          }
      })

      .done(function(datavideo) {
        if (datavideo.html == "") {
          $('.ajax-load').html('No more records found');
          return;
        }
        $('.ajax-load').hide();
        $('#post-data').append(datavideo.html);
        FB.XFBML.parse();
      })

      .fail(function(jqXHR, ajaxOptions, thrownError)
      {
            alert('server not responding...');
      });
    }
});
