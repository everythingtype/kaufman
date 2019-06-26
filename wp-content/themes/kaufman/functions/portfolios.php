<?php


// Post Type

function create_etc_portfolio() {
	register_post_type( 'etc_portfolios',
		array(
			'labels' => array(
				'name' => 'Portfolios',
				'singular_name' => 'Portfolio',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Portfolio',
				'edit' => 'Edit',
				'edit_item' => 'Edit Portfolio',
				'new_item' => 'New Portfolio',
				'view' => 'View',
				'view_item' => 'View Portfolio',
				'search_items' => 'Search Portfolios',
				'not_found' => 'No Portfolios found',
				'not_found_in_trash' => 'No Portfolios found in Trash',
				'parent' => 'Parent Portfolio'
			),
			'public' => true,
			'hierarchical' => false,
			'supports' => array( 'title','editor','author','thumbnail','custom-fields','revisions', 'page-attributes'  ),
			'rewrite' => array('slug' => 'portfolio'),
			'has_archive' => true,
			'show_in_nav_menus' => true
		)
	);
}

add_action( 'init', 'create_etc_portfolio' );