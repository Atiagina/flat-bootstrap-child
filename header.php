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
<link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php wp_head(); ?>
<script>
	$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 200) {
	  $('.wanderwomenlogoonscroll').addClass('makevisible');
    $('.wanderwomenlogoonscroll').fadeIn();
	  $('.navbar-fixed-top').removeClass('black');
	  $('.navbar-fixed-top').addClass('white');
	  $('.navbar-default>.container>.navbar-collapse>.menu-main-menu-container>.navbar-nav>li>a').css({'color':'black'});
  } else {
	  $('.wanderwomenlogoonscroll').removeClass('makevisible');
    $('.wanderwomenlogoonscroll').fadeOut();
	$('.navbar-fixed-top').removeClass('white');
	  $('.navbar-fixed-top').addClass('black');
	  $('.navbar-default>.container>.navbar-collapse>.menu-main-menu-container>.navbar-nav>li>a').css({'color':'white'});
	  
  }
});
	</script>
	
	
<!-- jQuery for smoothscrolling from the svg map  -->	
	
<script>

	$(document).ready(function() {
	$('div.svgmap svg a').on('click',function (e) {
		e.preventDefault();
	
		var target = $(this).attr('xlink:href');
		var $target = $(target);
	
		$('html, body').stop().animate({
			'scrollTop': $target.offset().top
		}, 900, 'swing', function () {
			window.location.hash = target;
		});
	});
});
	
	</script>
	
<!-- jQuery for tooltips on the map  -->

<script type="text/javascript">
$(document).ready(function() {
// Tooltip only Text
$('.masterTooltip').hover(function(){
        // Hover over code
        var title = $(this).attr('title');
        $(this).data('tipText', title).removeAttr('title');
        $('<p class="tooltip"></p>')
        .text(title)
        .appendTo('body')
        .fadeIn('slow');
}, function() {
        // Hover out code
        $(this).attr('title', $(this).data('tipText'));
        $('.tooltip').remove();
}).mousemove(function(e) {
        var mousex = e.pageX ; //Get X coordinates
        var mousey = e.pageY ; //Get Y coordinates
        $('.tooltip')
        .css({ top: mousey, left: mousex })
});
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
		$navbar = '<div class="navbar ' . $xsbf_theme_options['navbar_classes'] . ' navbar-fixed-top black">'
			.'<div class="container">'
        	.'<div class="navbar-header">'
			. '<a href="'
			. esc_url( home_url( '/' ))
			. '" rel="home"><img src="'
			. get_header_image()
			. ' " alt="logo" class="wanderwomenlogoonscroll"></a>'
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
			'menu_class' => 'nav navbar-nav navbar-right', //<ul> class
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
               <div class="site-logo">
               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo header_image() ?>" alt="logo" id="wanderwomenlogo"></a>
               <?php if( get_field('tagline') ): ?>

				   <h4><?php the_field('tagline'); ?></h4>

<?php endif; ?>
					</div>
                <?php //if ( function_exists( 'jetpack_the_site_logo' ) ) jetpack_the_site_logo(); ?>
               <!--
                 <div class="site-branding-text col-xs-4">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' )?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>
				-->
				<div class="currentissueheader">
				<?php 
		$query = new WP_Query( 'pagename=current-issue' );
		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                echo '<img src="';
                echo $url;
                echo '" class="img-responsive issuecover">';
               
				echo '<div class="currentissuegroup">  <h3>' . get_the_title() . '</h3>';
				
				the_content();
				the_field('button');
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
