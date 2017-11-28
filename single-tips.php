<?php
/*

PostType Page Template: Tips

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