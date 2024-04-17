 
  $("#form-input").attr("chat","conclusion");
  $('#question7').before('<div class="reply-box" ><p>'+input.toUpperCase()+'</p></div><div class="clearfix"></div><br>');

  setTimeout(function(){
    $("#question7").show();
    $('#summit').css('display','flex');
    $('#mobile #conclusion').css('display','block');  
    $('.sticky-parent').css('height','9000vh'); 
    $('.sticky-parent').css('scroll-behavior','auto'); 
    $('#mobile-parent').css('height','400vh!important');  
    $("#column-center").show();
    $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
  }, 3000);

  setTimeout(function() {
      $("#question8").show();
      $(".chat-body").animate({ scrollTop: $('.col-md-9').prop("scrollHeight")}, 1000);
  }, 6000);  

  if (window.matchMedia('screen and (min-width: 800px)').matches){ 
    $(".mobile-origin").addClass("not_active");
    setTimeout(function() {
      window.scrollTo({ 
          left: 0, 
          top: document.body.scrollHeight,
          behavior: "smooth" 
      });          
    }, 15000); 
  } else {
    setTimeout(function() {
      document.querySelector('.mobile-summit').scrollIntoView({
          behavior: 'smooth',
          block: 'start'
      });    
    }, 15000); 
  }


  //to show body modeler
  let models = document.querySelectorAll('#front-body .full');
  modelerLoader(models);