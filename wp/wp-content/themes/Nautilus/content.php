<?php
/**
 * @package fabthemes
 * @since fabthemes 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mbox'); ?>>
	
	<div class="post-image">
						<?php
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
							$image = aq_resize( $img_url, 300, 0, true ); //resize & crop the image
						?>
						
						<?php if($image) : ?>
							<a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>"/></a>
						<?php endif; ?>
					
					</div>

	
	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'fabthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->


	<div class="entry-summary">
		<?php wpe_excerpt('wpe_excerptlength_index', ''); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
	
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'fabthemes' ), __( '1 Comment', 'fabthemes' ), __( '% Comments', 'fabthemes' ) ); ?></span>
		<a class="rmore" href="<?php the_permalink(); ?>"> <?php _e( 'Read more', 'fabthemes' ); ?> </a>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
