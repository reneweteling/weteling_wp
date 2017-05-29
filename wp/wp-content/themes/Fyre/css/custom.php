<?php
	header("Content-type: text/css;");
	
	if( file_exists('../../../../wp-load.php') ) :
		include '../../../../wp-load.php';
	else:
		include '../../../../../wp-load.php';
	endif;
?>

<?php
	// Styles	
	$primary 	= ft_of_get_option('fabthemes_primary_color','#769A38');
	$secondary	= ft_of_get_option('fabthemes_secondary_color','');
	$link 		= ft_of_get_option('fabthemes_link_color','');
	$hover 		= ft_of_get_option('fabthemes_hover_color','');
	
?>

#welcome-box, .home-blog .home-blog-title .hdate,
#footer-widgets .widget h1.widget-title:after,.entry-header .hdate,
#sub-header {
	background: <?php echo $primary ?>;
}

.home-widget i{
	color: <?php echo $primary ?>
}

#masthead, .main-navigation, #footer-widgets{
	background: <?php echo $secondary ?>;
}
/* draw any selected text yellow on red background */
::-moz-selection { color: #fff;  background: <?php echo $primary ?>; }
::selection      { color: #fff;  background: <?php echo $primary ?>; } 
/* Links */

a, .hentry .entry-header .entry-meta span {
	color: <?php echo $link ?>;
}

a:visited {
	color: <?php echo $link ?>;
}

a:hover,
a:focus,
a:active {
	color:<?php echo $hover ?>;
	text-decoration: none;
}


