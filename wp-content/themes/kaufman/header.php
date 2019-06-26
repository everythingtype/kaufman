<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php get_template_part('parts/favicons'); ?>

		<?php wp_head(); ?>

</head>
<body>

<header class="topheader">

	<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Dean Kaufman</a></h1><span class="notch"></span>

	<div class="menutoggle"><span>Menu</span></div>
	<div class="topnav">
	<?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
	</div>

	<?php if ( is_singular( 'etc_portfolios' ) ) : ?>
		<h2><strong><?php the_title(); ?></strong>
		<? $subtitle = get_field('subtitle'); ?>
		<?php if ( $subtitle && $subtitle != '' ) : ?>
			<br /><?php echo $subtitle; ?>
		<?php endif; ?></h2>

	<?php endif; ?>

</header>

<div class="mobilenav">

	<div class="column"><div class="padding"><?php wp_nav_menu( array( 'theme_location' => 'side' ) ); ?></div></div>
	<div class="column"><div class="padding"><?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?></div></div>
</div>


<div class="sidenav">
<?php wp_nav_menu( array( 'theme_location' => 'side' ) ); ?>
</div>