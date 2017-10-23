<?php get_header(); ?>
<!-- index.php -->

<div class="posts">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">

				<?php if ( is_single() ) : ?>
					<h3><?php the_title(); ?></h3>
				<?php else : ?>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php endif; ?>

				<?php $images = get_field('gallery'); ?>

				<?php if ( $images ) : ?>
					<?php 
						$classes = 'gallery';
						$imagecount = count($images); 
						if ( $imagecount == 1 ) $classes .= ' single';
					?>
					<div class="<?php echo $classes; ?>">
						<?php foreach( $images as $image ): ?>
							<?php $caption = $image['caption']; ?>
							<figure>
								<a class="lightbox" href="<?php echo $image['url']; ?>" <?php if ( $caption && $caption != '' ) echo 'title="' . $caption . '"'; ?>><?php echo spellerberg_get_image($image['ID'],'large');  ?></a>
							</figure>
	 					<?php endforeach; ?>
					</div>
				<?php endif; ?>

				<p class="date"><?php the_time('F n, Y'); ?></p>

				<?php if ( is_single() ) : ?>
					<?php the_content(); ?>
				<?php else : ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>

				<div class="share">
					<h4>Share</h4> 
					<ul>
						<?php $url = get_permalink(); ?>
						<li><a href="http://www.facebook.com/share.php?u=<?php echo $url; ?>">Facebook</a></li>
						<li><a href="http://twitter.com/?status=<?php echo $url; ?>">Twitter</a></li>
						<li><a href="mailto:?subject=<?php the_title_attribute(); ?>&amp;body=<?php echo $url; ?>">Email</a></li>
					</ul>
				</div>

			</div>
		<?php endwhile; ?>
	<?php endif; ?>

</div>


<?php get_footer(); ?>