<?php
/*

PostType Page Template: Interview

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
	<div class="interviewgrid1">
	
	<div class="interviewheadline">
	<?php the_field('interview-headline'); ?>
		</div>
	<div class="interviewhero">
	<img src="<?php the_field('interview-hero'); ?> " />
		</div>
	
	<div class="interviewintro">
	<?php the_field('interview-intro'); ?>
		</div>
	</div>
	

		<div class="row">
	<div class="col-xs-12 col-sm-offset-3 col-sm-6 interviewtext1">
	<?php the_field('interview-text-1'); ?>
		</div>
	</div>
		
			<div class="interviewgrid2">
		<div class="interviewimage1">
	 <img src="<?php the_field('interview-image-1'); ?> " />
		</div>
		
		<div class="interviewquote">
		<?php the_field('interview-quote'); ?>
		</div>
	</div>
	
		<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6  interviewtext2">
	<?php the_field('interview-text-2'); ?>
		</div>
	</div>
	<div class="interviewgrid3">
		<div class="interviewimage2">
			<img src="<?php the_field('interview-image-2'); ?> " />
		</div>
			<div class="interviewquote2">
		<?php the_field('interview-quote-2'); ?>
		</div>
		</div>
		
		<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6 interviewtext3">
	<?php the_field('interview-text-3'); ?>
		</div>
		
	<div class="col-xs-12 interviewimage3">
			<img src="<?php the_field('interview-image-3'); ?> " />
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-offset-3 col-sm-6 interviewtext4">
	<?php the_field('interview-text-4'); ?>
		</div>
		<div class="col-xs-offset-6 col-xs-6 col-sm-offset-8 col-sm-2">
		<?php the_field('byline'); ?>
		</div>
	</div>
	
</div><!-- .container -->


<!-- you might also like -->
<div class="container">
<div class="row">
	<h1>[ you might also like ]</h1>
	<?php
	$related = new WP_Query(
    array(
        'category__in'   => wp_get_post_categories( $post->ID ),
        'posts_per_page' => 3,
        'post__not_in'   => array( $post->ID )
    )
);

if( $related->have_posts() ) { 
    while( $related->have_posts() ) { 
        $related->the_post(); ?>
       <div class="col-xs-12 col-sm-4 sectionpost <?php post_class(); ?>" id="post-<?php the_ID(); ?>">
<div class="row">
<?php 
	echo '<div class="col-xs-6 likeimg">';
	echo get_the_post_thumbnail( $post_id, 'thumbnail');
	// $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail-news') );
				
				//echo '<img class="" src="';
				//echo $url;
				//echo '">';
	
	echo '</div>';
	?>
<!--get the post title, wrap it in an h3 tag and make it a hyper link to
the actual post-->
	<div class="col-xs-6">
<h3 style="margin-top: 0;"><a href="<?php the_permalink(); ?>"><?php
the_title(); ?></a></h3>
<h4><?php the_field('post-tagline'); ?></h4>
<a class="readmore" href="<?php the_permalink(); ?>">Read more</a>
	</div>
	</div>
	</div>
<?php
    }
    wp_reset_postdata();
}
	
	?>
	
	
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


<?php get_footer(); ?>