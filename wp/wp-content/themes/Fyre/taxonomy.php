<?php
/**
 * The template for displaying portfolio taxonomy.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package fabthemes
 */

get_header(); ?>

<div id="sub-header">
	<div class="container"> <div class="row"> 
		<div class="col-md-6">
			<?php $term =	$wp_query->queried_object; 
			echo '<h2>'.$term->name.'</h2>'; ?>
		</div>
	</div> </div>	
</div>

<div class="container"> <div class="row"> 
	<div id="primary" class="content-area">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="col-lg-4 col-md-4 ">
				<div class="folio-box">
					<div class="folio-image">
						<?php 
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
						$image = aq_resize( $img_url, 768, 560, true,true,true ); //resize & crop the image
						?>
						<?php if($image) : ?>
							<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
						<?php endif; ?>
					</div>
					<a href="<?php the_permalink(); ?>"> 
						<div class="folio-data">
							<h2> <?php the_title(); ?></h2>
						</div>
					</a> 
				</div>
			</div>

			<?php endwhile; ?>
			<div class="clear"></div>
			<div class="col-md-12">
				<?php kriesi_pagination(); ?>
			</div>
			

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
	</div>
</div> </div>
<?php get_footer(); ?>