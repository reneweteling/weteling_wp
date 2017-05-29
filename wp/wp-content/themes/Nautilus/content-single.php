<?php
/**
 * @package fabthemes
 * @since fabthemes 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post-image">
			<?php
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
				$image = aq_resize( $img_url, 680, 0, true ); //resize & crop the image
			?>
			
			<?php if($image) : ?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo $image ?>"/></a>
			<?php endif; ?>
					
	</div>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'fabthemes' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'fabthemes' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', ', ' );

			if ( ! fabthemes_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'fabthemes' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'fabthemes' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'fabthemes' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'fabthemes' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'fabthemes' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->