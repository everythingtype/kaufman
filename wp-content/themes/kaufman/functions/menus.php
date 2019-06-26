<?php

/* Menus and Sidebars */

function register_custom_menus() {
	register_nav_menu('side', __('Left-side Menu'));
	register_nav_menu('top', __('Top Menu'));
}

add_action('init', 'register_custom_menus');