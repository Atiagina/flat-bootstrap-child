<?php

/**
Template Name:Home Page
*/

/**
 * Theme: Flat Bootstrap
 * 
 * Template Name:Home Page
 *
 * This is the template that displays home page
 *
 * @package flat-bootstrap
 */

get_header(); ?>
<div class="container">
<div class="row">
<div id="featured">
	 <?php 
		$query = new WP_Query( 'pagename=featured' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				
				the_content();
				echo '<img id="mapofcdmx" src="';
				echo $url;
				echo '" alt="map of cdmx">';
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
	
	
	</div>
	</div>
</div>
<?php get_sidebar('home'); ?>


<div class="container">
<div class="row">
<h1>I love cats. Especially my cat Kot.</h1>
	</div>
</div>
<div class="container">
<div class="row">
<!-- slide show goes here -->
<?php
if( function_exists('fa_display_slider') ){
    fa_display_slider( 194 );
}
?> 
	</div>
</div>

<div class="container">
<div class="row">
<h2>Recent Posts</h2>
<?php $custom_query = new
WP_Query('posts_per_page=4&category_name=architecture');
while($custom_query->have_posts()) : $custom_query->the_post(); ?>
<!--before you start showing me a post, wrap it in a div with a
bootstrap class-->
<div class="col-md-3 push <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
<!--get the thumbnail; you created this with 'featured image'-->
<?php the_post_thumbnail (medium); ?>
<!--get the post title, wrap it in an h3 tag and make it a hyper link to
the actual post-->
<h3><a href="<?php the_permalink(); ?>"><?php
the_title(); ?></a></h3>
<!--get the date. M d, Y – will output – Nov 06, 2015-->
<?php echo '<p class="date">' . date('l, F jS') . '</p>'; ?>
<!--get the author's name-->
<p class="author"><?php the_author(); ?></p>
<!--get the excerpt-->
<?php the_excerpt(); ?>
	</div>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

<!--loop will go here-->

</div>
</div>

<?php get_footer(); ?>
