jQuery(document).ready(function() {

/* Navigation */

	jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   { opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	


 
/* Banner claaass */

	jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');

/* Scroll */

jQuery('#secondary').enscroll({
    showOnHover: true,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});

/* Masonry */

(function ($){
      $('.mason-area').imagesLoaded(function() {
        // Prepare layout options.
        var options = {
          itemWidth: 220, // Optional min width of a grid item
          autoResize: true, // This will auto-update the layout when the browser window is resized.
          container: $('.mason-area'), // Optional, used for some extra CSS styling
          offset: 20, // Optional, the distance between grid items
          flexibleWidth: 300 // Optional, the maximum width of a grid item
        };

        // Get a reference to your grid items.
        var handler = $('.mbox');

        // Call the layout function.
        handler.wookmark(options);
      });
    })(jQuery);

	
});