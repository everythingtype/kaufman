<?php

function csm_enqueue_scripts() {

	$version = "b3";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	// JS

	$layoutjs = get_template_directory_uri() . '/js/layout.js';
	wp_register_script('layoutjs',$layoutjs, false, $version);

	$fadejs = get_template_directory_uri() . '/js/fade.js';
	wp_register_script('fadejs',$fadejs, false, $version);

	$portfoliojs = get_template_directory_uri() . '/js/portfolio.js';
	wp_register_script('portfoliojs',$portfoliojs, false, $version);

	$colorboxjs = get_template_directory_uri() . '/js/jquery.colorbox-min.js';
	wp_register_script('colorboxjs',$colorboxjs, false, $version);



	// CSS

	$fontscss = get_template_directory_uri() . '/fonts/fonts.css';
    wp_register_style('fontscss',$fontscss, false, $version);

	$themecss = get_stylesheet_directory_uri() . '/style.css';
	wp_register_style('themecss',$themecss, false, $version);


	// Enqueue

	if(!wp_script_is('jquery')) wp_enqueue_script("jquery");

	wp_enqueue_script( 'colorboxjs',array('jquery'));
	wp_enqueue_script( 'layoutjs',array('jquery','colorboxjs'));

	wp_enqueue_style( 'fontscss');
	wp_enqueue_style( 'themecss');

	if ( is_page() && !is_page_template('page-info.php') ) :
		wp_enqueue_script( 'fadejs',array('jquery'));
	endif;

	if ( is_singular('etc_portfolios') ) :
		wp_enqueue_script( 'fadejs',array('jquery'));
		wp_enqueue_script( 'portfoliojs',array('jquery'));
	endif;

}

add_action('wp_print_styles', 'csm_enqueue_scripts');