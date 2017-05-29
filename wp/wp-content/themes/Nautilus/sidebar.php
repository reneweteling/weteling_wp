<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package fabthemes
 * @since fabthemes 1.0
 */
?>
		<div id="secondary" class="widget-area" role="complementary">
		
			<?php //do_action( 'before' ); ?>
			
			<header id="masthead" class="site-header" role="banner">
				<hgroup>
					<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</hgroup>
		
				<nav role="navigation" class="site-navigation main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary','fallback_cb'=> '' ) ); ?>
				</nav><!-- .site-navigation .main-navigation -->
			</header><!-- #masthead .site-header -->		
		
		
			<?php //do_action( 'before_sidebar' ); ?>
			
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<?php endif; // end sidebar widget area ?>
			<?php get_template_part( 'sponsors' ); ?>
		</div><!-- #secondary .widget-area -->
