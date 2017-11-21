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
<?php $query = new WP_Query( 'pagename=featured' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
					$query->the_post(); ?>
<div class="container featuredcontainer" style="background-color: <?php the_field('featuredcolor'); ?>" />
<div class="row">
<div id="featured">
	 <?php 
		
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

<div class="container-fluid fluidblack">
<div class="row">
<div id="currentissue">
	 <?php 
		$query = new WP_Query( 'pagename=current' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				
				the_content();
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
	
	
	</div>
	</div>
</div>

<div class="container">
<div class="row">
<div id="featured-country">
	 <?php 
		$query = new WP_Query( 'pagename=featured-country' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				echo '<div class="col-xs-6">';
				echo '<img id="featured-country-img" src="';
				echo $url;
				echo '" alt="map of cdmx"></div>';
				echo '<div class="col-xs-6 featured-country-text">';
				echo '<h1><a href="';
				the_permalink();
				echo '">';
				the_title(); 
				echo '</a></h1>';
				echo '<h4>';
				the_field('featured-tagline');
				echo '</h4>';
				the_content();
				echo '</div>';
				
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
<h2>[ pictures ]</h2>
<!-- slide show goes here -->
<?php
if( function_exists('fa_display_slider') ){
    fa_display_slider( 243 );
}
?> 
	</div>
</div>

<div class="container">

<div class="row">

<?php if( get_field('hero_image') ): ?>

	<img src="<?php the_field('hero_image'); ?>" />

<?php endif; ?>

	</div>
</div>

<div class="container">
<div class="row">
<h2>[ tips ]</h2>
<?php $custom_query = new
WP_Query('posts_per_page=4&category_name=tips');
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
