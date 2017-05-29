<?php

// Register Custom Post type

$slides = new CPT('slide', array(
    'supports' => array('title','editor','thumbnail')
));


// define the columns to appear on the admin edit screen
$slides->columns(array(
    'cb' => '<input type="checkbox" />',
    'icon' => __('Icon'),
    'title' => __('Title'),
    'date' => __('Date')
));

// Set post type Dashicon

$slides->menu_icon("dashicons-slides");

// Get slide items

function get_slide_items($count){
	global $post;
	 $args = array(
        'posts_per_page' => $count,  // Limit to 5 posts
        'post_type' => 'slide',  // Query for the default Post type
    );

	$loop = new WP_Query( $args );
	echo "<ul class='slides'>";
	while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<li>
		
		<?php 
		$thumb = get_post_thumbnail_id();
		$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
		$image = aq_resize( $img_url, 1600, 580, true,true,true ); //resize & crop the image
		?>
		<?php if($image) : ?>
			<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
		<?php endif; ?>
		<div class="flex-caption">
		<div class="container"> <div class="row"> 
			<div class="col-md-12">
					<h2> <?php the_title(); ?> </h2>
			  	  	<span> <?php the_excerpt(); ?> </span>
	  	  		</div>
  	  	</div></div>
  	  	</div>
  	</li>

    <?php endwhile;
    echo "</ul>";
    wp_reset_postdata();
}

// Slides Shortcode

function slide_shortcode( $atts ) {

	$count = 3 ;

	if( function_exists( 'get_slide_items' ) ) {

			// Attributes
			extract( shortcode_atts(
				array(
					'count' => $count,
				), $atts )
			);

		    if( $count != NULL ) {
		    return get_slide_items($count);
			}
		}
	}
add_shortcode( 'slide', 'slide_shortcode' );