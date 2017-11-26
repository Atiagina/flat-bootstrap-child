<?php
/*

PostType Page Template: Pictures

 */

get_header(); ?>

<div class="container">

<div class="row">
<div class="col-xs-12 col-sm-4">
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
		</div>
	
	<div class="pictureintro">
	<?php the_field('picture-intro'); ?>
	<?php the_field('picture-byline'); ?>
		</div>
	</div>

</div>
<?php get_footer(); ?>