<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="homecontent">

		<div class="homeimage">
			<?php $image = get_field('image'); ?>
			<?php if ( $image && $image != '' ) : ?>
				<?php echo spellerberg_get_image($image,'large');  ?>
			<?php endif; ?>

			<?php $statement = get_field('statement'); ?>
			<?php if ( $statement && $statement != '' ) : ?>
				<div class="caption"><?php echo wpautop($statement);  ?></div>
			<?php endif; ?>
		</div>

		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>