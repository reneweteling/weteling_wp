<?php
/**
 * The template for displaying search results pages.
 *
 * @package fabthemes
 */

get_header(); ?>

<div id="sub-header">
	<div class="container"> <div class="row"> 
		<div class="col-md-6">
			<h2> <?php printf( __( 'Search Results for: %s', 'fabthemes' ), get_search_query() ); ?> <h2>
		</div>
		<div class="col-md-6">
			
		</div>
	</div> </div>	
</div>

<div class="container"> <div class="row"> 
<div class="col-md-8">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php kriesi_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
</div>
<?php get_sidebar(); ?>
</div> </div>
<?php get_footer(); ?>
