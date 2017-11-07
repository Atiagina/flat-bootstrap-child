<?php

/**
Template Name:Home Page
*/

/**
 * Theme: Flat Bootstrap
 * 
 * Template Name:Home Page
 *
 * This is the template that displays home page
 *
 * @package flat-bootstrap
 */

get_header(); ?>
<?php get_sidebar('home'); ?>

<div class="container">
<div class="row">
<h1>I love cats. Especially my cat Kot.</h1>
	</div>
</div>
<div class="container">
<div class="row">
<!-- slide show goes here -->
<?php
if( function_exists('fa_display_slider') ){
    fa_display_slider( 194 );
}
?> 
	</div>
</div>

<?php get_footer(); ?>
