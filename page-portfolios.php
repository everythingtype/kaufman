<?php /* Template Name: Portfolios */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<?php if( have_rows('portfolios') ): ?>
			<div class="portfolios">
			<?php while ( have_rows('portfolios') ) : the_row(); ?>
				<?php $portfolio = get_sub_field('portfolio'); ?>
				<?php if ( $portfolio && $portfolio != '' ) : ?>

					<?php 

						$post = $portfolio; 
						setup_postdata( $post ); 

						$subtitle = get_field('subtitle');
						$blurb = get_field('blurb');

						$thumbnail_image = get_field('thumbnail_image');

					?>

					<div class="item"><div class="padding">

							<div class="box">

								<div class="ratio"></div>
								<div class="inner">

									<?php if ( $thumbnail_image && $thumbnail_image != '' ) : ?>
										<a class="thumbnail" href="<?php the_permalink(); ?>">
											<?php echo spellerberg_get_image($thumbnail_image,'large');  ?>

											<div class="blurb"><?php if ( $blurb && $blurb != '' ) echo $blurb; ?></div>

										</a>
									<?php endif; ?>

									<h3><a href="<?php the_permalink(); ?>">
										<strong><?php the_title(); ?></strong>

										<?php if ( $subtitle && $subtitle != '' ) : ?>
											<br /><?php echo $subtitle; ?>
										<?php endif; ?>

									</a></h3>

								</div>

							</div>

					</div></div>

				    <?php wp_reset_postdata(); ?>

				<?php endif; ?>
			<?php endwhile; ?>

		<?php endif; ?>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>