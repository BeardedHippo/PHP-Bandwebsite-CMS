$(document).ready(function() {

  if ($(window).width() > 960) {
    popup = {
    init: function(){
      $('figure').click(function(){
        popup.open($(this));
      });

      $(document).on('click', '.popup img', function(){
        return false;
      }).on('click', '.popup', function(){
        popup.close();
      })
    },
    open: function($figure) {
      $('.gallery').addClass('pop');
      $popup = $('<div class="popup" />').appendTo($('body'));
      $fig = $figure.clone().appendTo($('.popup'));
      $bg = $('<div class="bg" />').appendTo($('.popup'));
      $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
      $shadow = $('<div class="shadow" />').appendTo($fig);
      src = $('img', $fig).attr('src');
      $shadow.css({backgroundImage: 'url(' + src + ')'});
      $bg.css({backgroundImage: 'url(' + src + ')'});
      setTimeout(function(){
        $('.popup').addClass('pop');
        $('.imgwrap').css({"height":"auto"});
      }, 10);
    },
    close: function(){
      $('.gallery, .popup').removeClass('pop');
      setTimeout(function(){
        $('.popup').remove();
        $('.imgwrap').css({"height":"230px"});
      }, 100);
    }
  }

  popup.init()
  }

  function scrollNav() {
    $('.nav ul li a').click(function(){
      //Toggle Class
      $("ul .active").removeClass("active");
      $(this).closest('li').addClass("active");
      var theClass = $(this).attr("class");
      $('.'+theClass).parent('li').addClass('active');
      //Animate
      $('html, body').stop().animate({
          scrollTop: $( $(this).attr('href') ).offset().top - 160
      }, 400);
      return false;
    });
  }
  scrollNav();

  $('.bot').click(function(){
    $('html, body').stop().animate({
              scrollTop: $('#About').offset().top
          }, 400);
  });

  $('.logo').click(function(){
    $('html, body').stop().animate({
              scrollTop: $('#Home').offset().top
          }, 400);
  });

  $('.contact_button').click(function(){
    $('html, body').stop().animate({
              scrollTop: $('#Contact').offset().top
          }, 400);
  });

  var navPos = $(".active").position().left;

  $(".anchor_img").css({
  	"display":"inherit",
  	"left": navPos + "px"
  });

  	$( ".nav-section" ).mouseenter(function() {
  		var navPos = $(this).position().left;

  		$(".anchor_img").animate({
  		"left": navPos + "px",
  		}, 200, function() {
  			$(".anchor_img").stop(false,true);
  		});

    });
      	$( "nav" ).mouseleave(function() {
      	var navPos = $(".active").position().left;

      	$(".anchor_img").animate({
      		"left": navPos + "px",
      		}, 200, function() {
      			$(".anchor_img").stop(false,true);
      		});

      	});

    $( "figure" ).each(function() {
      // var num = $( this ).attr('class');
      if ( $(this).hasClass('1') ) {
        $('.mediaNav').hide();
      } else {
          var num = $(this).attr('class');
          $('.mediaNav').show();
          $('.' + num).css({"display":"none"});
      }
    });

    // var elCount = $(".gallery figure").size();
    // var elCalc = elCount /
    $(".gallery figure:nth-child(10n)").each(function() {
      var cNum = $(this).attr('class');
      $('.mediaNav ul').append("<li>" + cNum + "</li>");
    });
    //
    // $('.mediaNav ul li').append("<li>" + mediaNum + "</li>");

    $('.mediaNav ul li').click(function() {
      $('figure').hide(200);
      $( "." + $(this).text() ).show(200);
      $('html, body').stop().animate({
                scrollTop: $('#Media').offset().top - 160
            }, 300);
    });



    // if ($(".2")[0]){
    //     alert("yo");
    // } else {
    //     // Do something if class does not exist
    // }



  	});
