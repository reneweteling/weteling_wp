<?php
/**
 * The template for displaying all single posts.
 *
 * @package fabthemes
 */

get_header(); ?>

<div id="sub-header">
	<div class="container"> <div class="row"> 
		<div class="col-md-12">
			<?php the_title( '<h2>', '</h2>' ); ?>
			<span><?php echo get_the_term_list( $post->ID, 'genre', 'Genre: ', ', ' ); ?></span>
			<span><?php echo get_the_term_list( $post->ID, 'client', 'Client: ', ', ' ); ?></span>
		</div>
	</div></div>	
</div>

<div class="container"> <div class="row"> 
<div class="col-md-12">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



				<div class="entry-content">

					<?php 
						$gallery = get_post_gallery( $post, false );
						$ids = explode( ",", $gallery['ids'] );
						echo '<ul class="folio-list">';
						foreach( $ids as $id ) {
							$link   = wp_get_attachment_url( $id );
							$img_url  = wp_get_attachment_url( $id, "large");
							$image = aq_resize( $img_url, 960, 560, true, true, true ); ?>
							<li>
								<a rel="prettyPhoto[pp_gal]"  href='<?php echo $link?>'> <img src="<?php echo $image; ?>" /> </a>
							</li>
					<?php } ?>

					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'fabthemes' ),
							'after'  => '</div>',
						) );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php fabthemes_post_nav(); ?>
				</footer><!-- .entry-footer -->
			</article><!-- #post-## -->


			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

</div> </div>
<?php get_footer(); ?>