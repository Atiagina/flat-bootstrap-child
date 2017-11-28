<?php
/**
 * Theme: Flat Bootstrap
 * 
 * Template Name: Page - Category
 *
 * Page with sidebar that displays a site index
 *
 * This is the template that displays a site index with search, pages, categories,
 * tags, etc. It has a sidebar.
 *
 * @package flat-bootstrap
 */

get_header(); ?>

   <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
<div class="container">

<div class="row">
<div class="col-xs-12 col-sm-4 big-category-headline">
<?php
the_title(); ?>
	</div>
	</div>
</div>


<div class="container">

<div class="row">
<div class="category-top-grid">
<img src="<?php the_field('main-article-image'); ?>" >
<div class="main-article-headline">
	<?php the_field('main-article-title'); ?>
	</div>
<div class="main-article-intro">
	<?php the_field('main-article-description'); ?>
	</div>
	</div>
	
	</div>
</div>


<div class="container">
<div class="row">

<?php
	$custom_query = new WP_Query('category_name='.the_field('categoryname-field');.'&order=asc');
		
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

<?php endwhile; else:?>
        <div class="container not-found">
            <div class="entry">
                <p class="lead"><?php _e('Sorry, this page does not exist. Try searching for one.'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
        <?php endif; ?>


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
