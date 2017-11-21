<?php
/*

PostType Page Template: Artists

 */

get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>
<h1>Artists template</h1>
<img src="<?php the_field('hero_image'); ?>" alt="" >
<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>