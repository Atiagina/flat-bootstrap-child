<?php
/*

PostType Page Template: Interview

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
	
	<div class="interviewgrid2">
		
	<div class="interviewtext1">
	<?php the_field('interview-text-1'); ?>
		</div>
		
		<div class="interviewimage1">
	 <img src="<?php the_field('interview-image-1'); ?> " />
		</div>
		
		<div class="interviewquote">
		<?php the_field('interview-quote'); ?>
		</div>
	</div>
	<div class="interviewgrid3">
		
		<div class="interviewtext2">
	<?php the_field('interview-text-2'); ?>
		</div>
		
		<div class="interviewimage2">
			<img src="<?php the_field('interview-image-2'); ?> " />
		</div>
		
		<div class="interviewtext3">
	<?php the_field('interview-text-3'); ?>
		</div>
	<div class="interviewimage3">
			<img src="<?php the_field('interview-image-3'); ?> " />
		</div>
	</div>
	
	
</div><!-- .container -->

<?php get_footer(); ?>