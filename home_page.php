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

<div class="container-fluid country-fluid">
<div class="row">
<div id="featured-country">
	 <?php 
		$query = new WP_Query( 'pagename=featured-country' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				echo '<div class="col-xs-12 col-sm-7 featured-country-img">';
				echo '<img id="featured-country-img" src="';
				echo $url;
				echo '" alt="map of cdmx"></div>';
				echo '<div class="col-xs-12 col-sm-5 featured-country-text">';
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
<div class="container-fluid">
<h2 class="sectionheadline">[ people ]</h2>
<div class="row">

<?php $custom_query = new
WP_Query('posts_per_page=3&category_name=people');
while($custom_query->have_posts()) : $custom_query->the_post(); ?>
<!--before you start showing me a post, wrap it in a div with a
bootstrap class-->
<div class="col-xs-12 col-sm-4 push sectionpost <?php post_class(); ?>" id="post-<?php the_ID(); ?>">

<?php 
	echo get_the_post_thumbnail( $post_id, 'home-thumb', array( 'class' => 'sectionimg linebackground' ) );
	// $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail-news') );
				
				//echo '<img class="" src="';
				//echo $url;
				//echo '">'; ?>
<!--get the post title, wrap it in an h3 tag and make it a hyper link to
the actual post-->
<h3><a href="<?php the_permalink(); ?>"><?php
the_title(); ?></a></h3>
<h4><?php the_field('post-tagline'); ?></h4>
<!--get the author's name-->
<a href="<?php the_permalink(); ?>">Read more</a>
	</div>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

<!--loop will go here-->

	</div>
</div>




<div class="container-fluid">

<div class="row">
 <?php 
		$query = new WP_Query( 'pagename=advertising' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
              
               <img src="<?php the_field('ad-banner-1'); ?> " />
		 <?php
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
	
	</div>
</div>



<div class="container-fluid">
<h2 class="sectionheadline">[ pictures ]</h2>
<div class="row">

<!-- slide show goes here -->
<?php
$args = array('posts_per_page' => 1,
                    'orderby' => 'rand',
                    'category_name' => 'Pictures');
        $pictures_query = new WP_query( $args );
        //the loop
      
        if($pictures_query->have_posts()) {
			  echo '<div class="picturesgrid">';
			echo '<div class="pictureimg">';
			echo '<img src="';
			the_field('picture-main'); 
			echo '" />';
			echo '</div>';
			echo '<div class="picturetitle">';
			echo '<h1 class="pictureheadline">';
			the_field('picture-title'); 
			echo '</h1>';
			echo '<h3><a href="';
			the_permalink(); 
			the_field('picture-link-text');
			echo '</a></h3>';
			echo '</div>';
			
			echo '</div>';

}
	wp_reset_postdata();
?> 
</div>



<div class="container-fluid">
<h2 class="sectionheadline">[ tips ]</h2>
<div class="row">

<?php $custom_query = new
WP_Query('posts_per_page=4&category_name=tips');
while($custom_query->have_posts()) : $custom_query->the_post(); ?>
<!--before you start showing me a post, wrap it in a div with a
bootstrap class-->
<div class="col-xs-12 col-sm-3 push sectionpost <?php post_class(); ?>" id="post-<?php the_ID(); ?>">

<?php echo get_the_post_thumbnail( $post_id, 'home-thumb', array( 'class' => 'sectionimg linebackground' ) ); ?>
<!--get the post title, wrap it in an h3 tag and make it a hyper link to
the actual post-->
<h3><a href="<?php the_permalink(); ?>"><?php
the_title(); ?></a></h3>
<h4><?php the_field('post-tagline'); ?></h4>
<a href="<?php the_permalink(); ?>">Read more</a>
	</div>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

<!--loop will go here-->

</div>
</div>

<div class="container-fluid">

<div class="row">
 <?php 
	
		$query = new WP_Query( 'pagename=advertising' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
              
               <img src="<?php the_field('ad-banner-2'); ?> " />
		 <?php
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
	
	</div>
</div>

<div class="container-fluid">
<h2 class="sectionheadline">[ places ]</h2>
<div class="row">

<?php $custom_query = new
WP_Query('posts_per_page=3&category_name=places');
while($custom_query->have_posts()) : $custom_query->the_post(); ?>
<!--before you start showing me a post, wrap it in a div with a
bootstrap class-->
<div class="col-xs-12 col-sm-4 push sectionpost <?php post_class(); ?>" id="post-<?php the_ID(); ?>">

<?php echo get_the_post_thumbnail( $post_id, 'home-thumb', array( 'class' => 'sectionimg linebackground' ) ); ?>
<!--get the post title, wrap it in an h3 tag and make it a hyper link to
the actual post-->
<h3><a href="<?php the_permalink(); ?>"><?php
the_title(); ?></a></h3>
	<h4><?php the_field('post-tagline'); ?></h4>
<a href="<?php the_permalink(); ?>">Read more</a>
	</div>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

<!--loop will go here-->

	</div>
</div>



<div class="container-fluid">

<div class="row">
 <?php 
	
		$query = new WP_Query( 'pagename=advertising' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post(); ?>
              
               <img src="<?php the_field('ad-banner-3'); ?> " />
		 <?php
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
	
	</div>
</div>


<?php get_footer(); ?>