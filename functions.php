<?php

// Includes

require_once( 'functions/enqueue.php' );
require_once( 'functions/images.php' );
require_once( 'functions/menus.php' );
require_once( 'functions/portfolios.php' );
require_once( 'functions/spellerberg_wpsrcset.php' );


function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );


// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
	return '... (<a class="moretag" href="'. get_permalink($post->ID) . '">Read more</a>)';
}
add_filter('excerpt_more', 'new_excerpt_more');