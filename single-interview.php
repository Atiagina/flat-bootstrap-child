<?php
/*

PostType Page Template: Interview

 */

get_header(); ?>

<div class="container">

<div class="row">
<div class="col-xs-12 col-sm-4 category-headlin">
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