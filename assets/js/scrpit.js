jQuery(function ($) {
    "use strict";

    $('a[href="#"]').click(function (e) {
        e.preventDefault();
    });


    //OWL CAROUSEL
    $(".slider_area").owlCarousel({
        items: 4,
        loop: true,
        autoplay: true,
        margin:10,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        themeClass: 'news_slide',
        responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
    });
    
    
   $('.bxslider').bxSlider({
  	video: true,

      minSlides: 1,
	  maxSlides: 4,
	  slideWidth:280,
	  slideMargin: 10
	 });
    
  //sticky menu
    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 200) {
            $(".menu_area").removeClass("sticky");
        } else {
            $(".menu_area").addClass("sticky");
        }
    });

    //responsive nav
    
    	$('ul#navigation').slicknav({
		prependTo: ".responsive_menu_wrap"
		});

    
			
});
