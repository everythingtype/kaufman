<?php

// // Featured
// add_image_size( 'wopfeatured_s', 768, 768, false );
// add_image_size( 'wopfeatured_m', 1024, 1024, false );
// add_image_size( 'wopfeatured_l', 1800, 1800, false );
// add_image_size( 'wopfeatured_xl', 2400, 2400, false );
// 
// 
// // Thumbs
// add_image_size( 'wopthumb_m', 157, 213, true );
// add_image_size( 'wopthumb_mm', 246, 322, true );
// add_image_size( 'wopthumb_l', 289, 393, true );
// 
// // Detail
// add_image_size( 'wopobject_m', 633, 4000, false );
// add_image_size( 'wopobject_l', 1202, 4000, false );
// 
// // Inline
// add_image_size( 'wopinline_m', 633, 4000, false );
// add_image_size( 'wopinline_l', 1202, 4000, false );


function spellerberg_this_sites_sizesets() {

	$sets = Array();

	$sets[] = Array('thumbnail','medium','large','full');
	// $sets[] = Array('wopfeatured_s','wopfeatured_m','wopfeatured_l','wopfeatured_xl');
	// $sets[] = Array('wopthumb_m','wopthumb_mm','wopthumb_l');
	// $sets[] = Array('wopobject_m','wopobject_l');
	// $sets[] = Array('wopinline_m','wopinline_l');

	return $sets;

}