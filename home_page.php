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
				echo '" alt="featured country"></div>';
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
				echo '<a class="readmore" href="';
				the_permalink();
				echo '">Read more</a>';
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
<a class="readmore" href="<?php the_permalink(); ?>">Read more</a>
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

			<?php $custom_query = new
WP_Query(array ( 'orderby' => 'rand', 'category_name' => 'pictures', 'posts_per_page' => '1' ));
while($custom_query->have_posts()) : $custom_query->the_post(); ?>
<!--before you start showing me a post, wrap it in a div with a
bootstrap class-->
<div class="<?php post_class(); ?>" id="post-<?php the_ID(); ?>">

	<div class="picturegrid1">
	<div class="picturemain">
	<img src="<?php the_field('picture-main'); ?>" >
		</div>
	<div class="pictureheadline">
	<?php the_field('picture-title'); ?> 
	<?php the_field('picture-intro'); ?>
		<a href="<?php the_permalink(); ?>"> <button style="font-weight: bold; position: absolute;"><?php the_field('picture-link-text'); ?></button></a>
		</div>
	
	<div class="pictureintro">
	
		</div>


	</div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>
	
</div>
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
<a class="readmore" href="<?php the_permalink(); ?>">Read more</a>
	</div>

<?php endwhile; ?>
<?php wp_reset_postdata(); // reset the query ?>

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
<a class="readmore" href="<?php the_permalink(); ?>">Read more</a>
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