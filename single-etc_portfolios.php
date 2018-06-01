<?php get_header(); ?>

<?php if ( have_rows('gallery_images') ): ?>
<div class="portfolio">
	<div class="slides">

		<?php while ( have_rows('gallery_images') ) : the_row(); ?>
			<?php $image = get_sub_field('image'); ?>
			<div class="slide"><div class="slideinner">
				<?php spellerberg_the_image($image,'large'); ?>
			</div></div>
		<?php endwhile; ?>

		<div class="prevmask"></div>
		<div class="nextmask"></div>

	</div>

	<div class="grid">

	<?php while ( have_rows('gallery_images') ) : the_row(); ?>
		<?php $image = get_sub_field('image'); ?>
		<div class="griditem">
			<div class="padding">
				<?php spellerberg_the_image($image,'large'); ?>
			</div>
		</div>
	<?php endwhile; ?>

	</div>

</div>

<div class="captionwrap">
	<?php while ( have_rows('gallery_images') ) : the_row(); ?>
		<div class="caption">
			<?php echo get_sub_field('caption'); ?>
		</div>
	<?php endwhile; ?>
</div>

<div class="controls">
	<div class="padding">

		<div class="captsgrid">
			<a class="caption">Caption</a> <span> | </span><a class="gridtoggle"><span>Grid</span></a>
		</div>

		<div class="prevnext">
			<a class="previous"><span>Previous</span></a><span> | </span><a class="next"><span>Next</span></a>
		</div>

	</div>
</div>

<?php endif; ?>

<?php get_footer(); ?>