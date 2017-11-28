<?php
/*

PostType Page Template: Wander

 */

get_header(); ?>

<div class="container">

<div class="row">
<div class="col-xs-12 col-sm-4 category-headline">
<?php the_field('category-for-headline'); ?>
	</div>
	</div>
</div>

<div class="container">
<div class="row">
<div class="wandertop">
	
	<div class="picturemain">
	<!-- insert svg -->
	
		</div>
	<div class="wanderheadline">
	<?php the_field('wander-title'); ?> 
	<?php the_field('wander-intro'); ?>
		</div>
	</div>
	</div>
<div class="row neigborhood">
	
	
<?php $custom_query = new
WP_Query('category_name=wanderadditional');
while($custom_query->have_posts()) : $custom_query->the_post();
	 $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	?>
<!--before you start showing me a post, wrap it in a div with a
bootstrap class-->
<div class="col-xs-12 col-sm-offset-2 col-sm-8 cdmxcard <?php post_class(); ?>" id="post-<?php the_ID(); ?>">

<?php echo '<img src="';
	echo $url; 
	echo '" >';?>
<!--get the post title, wrap it in an h3 tag and make it a hyper link to
the actual post-->
<h3><?php
the_title(); ?></h3>
	<?php the_field('wander-description'); ?>
	<div class="wanderpicture">
	<img src="<?php the_field('wander-picture'); ?>" >
		</div>
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