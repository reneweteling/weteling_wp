jQuery(document).ready(function() {

// Flexslider
	jQuery('#slider-box').flexslider({
		controlNav: false
	});

// Prettyphoto
	jQuery("a[rel^='prettyPhoto']").prettyPhoto();	


// Animate the scroll to top
	jQuery(window).scroll(function(){
		if (jQuery(this).scrollTop() > 200) {
			jQuery('.go-top').fadeIn();
		} else {
			jQuery('.go-top').fadeOut();
		}
	});
	jQuery('.go-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, 300);
	})


// Mobile menu
	jQuery('#fyre').slicknav({
		prependTo:'.jsmenu'
	});
	
});
