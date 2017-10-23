<?php /* Template Name: Info */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<div class="info">

	<?php while (have_posts()) : the_post(); ?>

		<?php $dual_column = get_field('dual_column'); ?>
		<?php if ( $dual_column && $dual_column != '' ) : ?>
			<?php $hasdual = true; ?>
			<div class="dualcolumn">
				<?php echo $dual_column;  ?>
				<?php if ( is_page('contact') ) get_template_part('parts/signup'); ?>
			</div>
		<?php endif; ?>

		<?php $left_column = get_field('left_column'); ?>
		<?php if ( $left_column && $left_column != '' ) : ?>
			<div class="leftcolumn <?php if ( $hasdual ) echo 'hasdual'; ?>"><div class="padding">
				<?php echo $left_column;  ?>
				<?php if ( is_page('contact') ) get_template_part('parts/signup'); ?>
			</div></div>
		<?php endif; ?>

		<?php $right_column = get_field('right_column'); ?>
		<?php if ( $right_column && $right_column != '' ) : ?>
			<div class="rightcolumn <?php if ( $hasdual ) echo 'hasdual'; ?>"><div class="padding">
				<?php echo $right_column;  ?>
				<?php if ( is_page('contact') ) get_template_part('parts/signup'); ?>
			</div></div>
		<?php endif; ?>



	<?php endwhile; ?>

	</div>

<?php endif; ?>

<?php get_footer(); ?>