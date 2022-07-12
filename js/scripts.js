$(document).ready(function(){
    AOS.init({
        duration: 3000,
        once: true,
      });
      
    $(window).scroll(function() {
        $(".slideanim").each(function(){
          var pos = $(this).offset().top;
    
          var winTop = $(window).scrollTop();
            if (pos < winTop + 600) {
              $(this).addClass("slider");
            }
        });
      });
})