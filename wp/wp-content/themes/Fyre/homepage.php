<?php
/**
 * The homepage template file.
 Template name:Homepage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package fabthemes
 */

get_header(); ?>

<div id="slider-box" class="flexslider">
	<?php $slidecount = ft_of_get_option('fabthemes_slidecount','4'); ?>
	<?php get_slide_items($slidecount)?>
</div>

<!-- Welcome section -->
<div id="welcome-box" class="home-section">
	<div class="container"> <div class="row"> 
		<div class="col-md-12">
			<h2> <?php echo ft_of_get_option('fabthemes_welcome_title','Welcome to our Website');  ?> </h2>
			<span> <?php echo ft_of_get_option('fabthemes_welcome_text','Some text below the welcome title.'); ?> </span>
		</div>
	</div></div>
</div>

<!-- Features Section -->
<?php if (  is_active_sidebar( 'homewidget' ) ) { ?>

<div id="features-box" class="home-section"> 
	<div class="container"> <div class="row"> 
		<div class="col-md-12"> 
			<div class="section-title">
				<h2> <?php echo ft_of_get_option('fabthemes_feature_title','Awesome Features');  ?></h2>
				<span> <?php echo ft_of_get_option('fabthemes_feature_text','Checkout the list of features we provide');  ?></span>
			</div>
		</div>

		<div class="home-widget-box">
			<?php dynamic_sidebar( 'homewidget' ); ?>
		</div>
	</div></div>
</div>
<?php } ?>

<!-- Portfolio -->
<div id="portfolio-box" class="home-section">
	<div class="container"> <div class="row">
		<div class="col-md-12"> 
			<div class="section-title">
				<h2> <?php echo _e( 'Portfolio items', 'fabthemes' ); ?></h2>
				<span> <?php echo _e( 'Our latest portfolio items', 'fabthemes' ); ?></span>
			</div>
		</div>
	</div></div>
		<?php 
			 $count = 8;
			 $args = array(
		        'posts_per_page' => $count,  // Limit to posts
		        'post_type' => 'portfolio',  // Query for the default Post type
		    );

			$loop = new WP_Query( $args );
			echo "<ul class='home-portfolio-list clearfix'>";
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

			<li class="home-portfolio-item">
				<a href="<?php the_permalink(); ?>">
				<div class="overlay"> 
					 <h3> <?php the_title();?></h3>
				</div>
				</a>
				<figure class="portfolio-thumb"> 
					   	<?php 
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
						$image = aq_resize( $img_url, 480, 320, true,true,true ); //resize & crop the image
						?>
						<?php if($image) : ?>
							<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
						<?php endif; ?>
				</figure>
			</li>

		    <?php endwhile;
		    echo "</ul> ";
		    wp_reset_postdata();
		?>

</div>

<!-- Blog -->

<div id="blog-box" class="home-section">
	<div class="container"> <div class="row">
		<div class="col-md-12"> 
			<div class="section-title">
				<h2> <?php echo _e( 'Blog Posts', 'fabthemes' ); ?></h2>
				<span> <?php echo _e( 'Our latest blog posts', 'fabthemes' ); ?></span>
			</div>
		</div>

		<?php 
			 $count = 3;
			 $args = array(
		        'posts_per_page' => $count
		    );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); 
		?>

		<div class="home-blog col-md-4">

			<?php 
			$thumb = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
			$image = aq_resize( $img_url, 768, 460, true,true,true ); //resize & crop the image
			?>
			<?php if($image) : ?>
				<a href="<?php the_permalink(); ?>"><img class="blog-thumb" src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
			<?php endif; ?>

			<div class="home-blog-title clearfix">
				<div class="hdate">
					<span class="month"> <?php the_time('j'); ?> </span>
					<span class="date"> <?php the_time('F'); ?> </span>
				</div>
				<h2> <?php the_title()?> </h2>
					<span> <?php the_category(', '); ?> </span>
			</div>
			<div class="home-blog-entry">
				<?php the_excerpt();?>

			</div>
		</div>

 		<?php endwhile;
		   wp_reset_postdata();
		?>

	</div></div>
</div>

<!-- Client logos -->

<?php get_template_part( 'inc/clients' );?>

<?php get_footer(); ?>