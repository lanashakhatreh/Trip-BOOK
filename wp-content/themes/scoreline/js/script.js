/* for menu */
   jQuery(document).ready(function() {
	if( jQuery(window).width() > 767) {
	   jQuery('.nav li.dropdown').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	   jQuery('.nav li.dropdown-menu').hover(function() {
		   jQuery(this).addClass('open');
	   }, function() {
		   jQuery(this).removeClass('open');
	   }); 
	}
	jQuery('.nav').find('.caret').each(function(){
		jQuery(this).on('click', function(){
			if( jQuery(window).width() < 768) {
				jQuery(this).parent().next().slideToggle();
			}
			return false;
		});
	});
	/* Menu Tab */
	jQuery("li").on('click', function () {
    jQuery(".p_front").addClass("hidden");
    jQuery("." + jQuery(this).attr("id")).removeClass("hidden");
});
});

/* header Default slider */
 var swiper = new Swiper('.home_slider', {
		autoplay: 2500,
		nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
		loop:true,
        breakpoints: {
            1240: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }		
    });
	
	var swiper = new Swiper('.home_slider2', {
		autoplay: 2500,
		nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
		loop:true,
		 effect: 'fade',
        breakpoints: {
            1240: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }		
    });

/* for blog */
	 var swiper = new Swiper('.home_blog',{
		   pagination: '.swiper-pagination',
		 slidesPerView: 3,
        paginationClickable: true,
		 autoplay: 0,
		loop:false,
		
	   breakpoints: {
            1240: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });

/* for scroll arrow */
	 var amountScrolled = 300;

jQuery(window).scroll(function() {
	if ( jQuery(window).scrollTop() > amountScrolled ) {
		jQuery('a.back-to-top').fadeIn('slow');
	} else {
		jQuery('a.back-to-top').fadeOut('slow');
	}
});

jQuery('a.back-to-top').click(function() {
	jQuery('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});