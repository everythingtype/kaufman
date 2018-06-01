<?php /* Template Name: Info */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>

	<div class="info">

	<?php while (have_posts()) : the_post(); ?>

		<?php if( have_rows('blocks') ): ?>
			<?php while ( have_rows('blocks') ) : the_row(); ?>
				<?php $heading = get_sub_field('heading'); ?>
				<?php $columns = get_sub_field('columns'); ?>
				<?php $content = get_sub_field('content'); ?>

				<?php if ( $heading !== '' ) :?>
					<h3><?php echo $heading; ?></h3>
				<?php endif; ?>

				<div class="block <?php echo $columns; ?>">

					<?php echo $content; ?>

				</div>

			<?php endwhile; ?>
		<?php endif; ?>

		<?php if ( is_page('contact') ) get_template_part('parts/signup'); ?>

	<?php endwhile; ?>

	</div>

<?php endif; ?>

<?php get_footer(); ?>