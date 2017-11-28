<?php
/*

PostType Page Template: Pictures

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
<div class="picturegrid1">
	
	<div class="picturemain">
	<img src="<?php the_field('picture-main'); ?>" >
		</div>
	<div class="pictureheadline">
	<?php the_field('picture-title'); ?> 
	<?php the_field('picture-intro'); ?>
		</div>
	
	<div class="pictureintro">
	
	<?php the_field('picture-byline'); ?>
		</div>
	</div>
<div class="picture1">
<div class="picturearea">
	<img src="<?php the_field('picture-1'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-1'); ?> 
	</div>
</div>
<div class="picture2">
<div class="picturearea">
	<img src="<?php the_field('picture-2'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-2'); ?> 
	</div>
</div>
<div class="picture1">
<div class="picturearea">
	<img src="<?php the_field('picture-3'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-3'); ?> 
	</div>
</div>
<div class="picture2">
<div class="picturearea">
	<img src="<?php the_field('picture-4'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-4'); ?> 
	</div>
</div>
<div class="picture1">
<div class="picturearea">
	<img src="<?php the_field('picture-5'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-5'); ?> 
	</div>
</div>

<div class="picture2">
<div class="picturearea">
	<img src="<?php the_field('picture-6'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-6'); ?> 
	</div>
</div>

<div class="picture1">
<div class="picturearea">
	<img src="<?php the_field('picture-7'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-7'); ?> 
	</div>
</div>

<div class="picture2">
<div class="picturearea">
	<img src="<?php the_field('picture-8'); ?>" >
		</div>
	<div class="captionarea">
	<?php the_field('caption-8'); ?> 
	</div>
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
<?php get_footer(); ?>