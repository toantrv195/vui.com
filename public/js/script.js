$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      autoPlay: 3000, //Set AutoPlay to 3 seconds
 
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3]
 
  });

  //login
    $(".loginlink").click(function( event ){
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });
    
    
    
    $(".close").click(function(){
        $(".overlay").fadeToggle("fast");
    });
 
});


