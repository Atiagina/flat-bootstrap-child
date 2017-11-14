<?php
/**
 * Theme: Flat Bootstrap
 * 
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package flat-bootstrap
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
<script>
	$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 300) {
    $('.site-logo-onscroll').fadeIn();
  } else {
    $('.site-logo-onscroll').fadeOut();
  }
});
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<?php do_action( 'before' ); ?>
	
	<header id="masthead" class="site-header" role="banner">
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
 
			<h2 class="menu-toggle screen-reader-text sr-only "><?php _e( 'Primary Menu', 'flat-bootstrap' ); ?></h2>
			<div class="skip-link"><a class="screen-reader-text sr-only" href="#content"><?php _e( 'Skip to content', 'flat-bootstrap' ); ?></a></div>
<?php
		/**
		  * CUSTOM HEADER IMAGE DISPLAYS HERE FOR THIS THEME, BUT CHILD THEMES MAY DISPLAY
		  * IT BELOW THE NAV BAR (VIA CONTENT-HEADER.PHP)
		  */
		global $xsbf_theme_options;
		$custom_header_location = isset ( $xsbf_theme_options['custom_header_location'] ) ? $xsbf_theme_options['custom_header_location'] : 'content-header';
		if ( $custom_header_location == 'header' ) :
		?>
		
		<?php
		// Collapsed navbar menu toggle
		global $xsbf_theme_options;
		$navbar = '<div class="navbar ' . $xsbf_theme_options['navbar_classes'] . ' navbar-fixed-top">'
			.'<div class="container">'
        	.'<div class="navbar-header">'
			. '<a href="'
			. esc_url( home_url( '/' ))
			. '" rel="home"><img src="'
			. header_image()
			. ' " alt="logo" id="wanderwomenlogo"></a>'
		. '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
            .'<span class="icon-bar"></span>'
          	.'</button>';

		// Site title (Bootstrap "brand") in navbar. Hidden by default. Customizer will
		// display it if user turns off the main site title and tagline.
		$navbar .= '<a class="navbar-brand" href="'
			.esc_url( home_url( '/' ) )
			.'" rel="home">'
			.'</a>';
		
        $navbar .= '</div><!-- navbar-header -->';

		// Display the desktop navbar
		$navbar .= '<div class="navbar-collapse collapse">' ?>
		
       
	
		<?
		$navbar .= wp_nav_menu( 
			array(  'theme_location' => 'primary',
			//'container_class' => 'navbar-collapse collapse', //<nav> or <div> class
			'menu_class' => 'nav navbar-nav', //<ul> class
			'walker' => new wp_bootstrap_navwalker(),
			'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
			'echo'	=> false
			) 
		);
				
		echo apply_filters( 'xsbf_navbar', $navbar );
		?>

		</div><!-- .container -->
		</div><!-- .navbar -->
		</nav><!-- #site-navigation -->

		
			<div id="site-branding" class="site-branding">
			
			<?php
				/*
			// Get custom header image and determine its size
			if ( get_header_image() ) {
			?>
				<div class="custom-header-image" style="background-image: url('<?php echo header_image() ?>'); width: <?php echo get_custom_header()->width; ?>px; height: <?php echo get_custom_header()->height ?>px;">
				<div class="container">
                <?php //if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
                <div class="site-branding-text">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' )?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
				</div></div>
			<?php

			// If no custom header, then just display the site title and tagline
			} else {
			*/ ?>
				<div class="container">
               <div class="site-logo col-xs-12 col-sm-4">
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo header_image() ?>" alt="logo" id="wanderwomenlogo"></a>
					</div>
                <?php //if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
               <!--
                 <div class="site-branding-text col-xs-4">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' )?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
				-->
				<div class="currentissueheader col-xs-12 col-sm-8">
				<?php 
		$query = new WP_Query( 'pagename=current-issue' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
              ;
                echo '<div class="currentissuegroup"> <img src="';
                echo $url;
                echo '" class="img-responsive">';
               
				echo ' <h3>' . get_the_title() . '</h3>';
				
				the_content();
				echo '</div>';
			}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
					</div>
				</div>
			<?php
				/*
			} //endif get_header_image()
			*/
			?>
			</div><!-- .site-branding -->

		<?php			
		endif; // $custom_header_location
		?>			

		<?php
		/**
		  * ALWAYS DISPLAY THE NAV BAR
		  */
 		?>	
		

	</header><!-- #masthead -->

	<?php // Set up the content area (but don't put it in a container) ?>	
	<div id="content" class="site-content">
