$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });

  // scroll back  to top
  $(function(){
    $(window).scroll(function () {
      if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
      else $('#goTop').fadeOut();
      });
      $('#goTop').click(function () {
      $('body,html').animate({scrollTop: 0}, 'slow');
      });
  });

  //mobile
  $('#show_icon').click(function() {
    $('.mid_header').slideToggle();
  });

  //login
    $(".loginlink").click(function( event ){
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });
    
    
    
    $(".close").click(function(){
        $(".overlay").fadeToggle("fast");
    });
    
   $("div.alert").delay(3000).slideUp();
});

//upload image
$('#create_photo').click(function() {
    $.ajax({
      url: 'image/create',
      type: 'GET',
      cache: false,
      success: function(result) {
        $data = $(result);
        $('#load_content').html($data); 
      }
    });
});

//upload video

$('#create_video').click(function() {
    $.ajax({
      url: 'video/create',
      type: 'GET',
      cache: false,
      success: function(result) {
        $data = $(result);
        $('#load_content').html($data); 
      }
    });
});

function onchangeClick(e, type) {
  if (type == "photo"){
    $(e).css({
      background: 'url(/images/camera.png) no-repeat'
    });
    $(".video").css({
      background: 'url(/images/bg_video.png) no-repeat'
    });
  }
  else{
    $(".photo").css({
      background: 'url(/images/bg_camera.png) no-repeat'
    });
    $(e).css({
      background: 'url(/images/video.png) no-repeat'
    });
  }
}


//category loadmore
  $("#list").loadMore({
      selector: 'li',
      loadBtn: '#btn',
      limit: 4,
      load: 2,
      animate: true,
      animateIn: 'fadeInDown'
  });

