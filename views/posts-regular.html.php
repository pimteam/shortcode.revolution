<?php defined( 'ABSPATH' ) || exit; ?>

<div class="srevo-posts srevo-posts-regular">

	<?php if ( count($posts)) : ?>

		<?php foreach($posts as $p): 
			$post = $p;
			setup_postdata($post);?>

			<div id="srevo-post-<?php $p->ID ?>" class="srevo-post">

				<?php if ( has_post_thumbnail( $p->ID ) ) : ?>
					<a class="srevo-post-thumbnail" href="<?php get_permalink($p->ID) ?>"><?php the_post_thumbnail($p->ID); ?></a>
				<?php endif; ?>

				<h2 class="srevo-post-title"><a href="<?php echo get_permalink($p->ID); ?>"><?php echo get_the_title($p->ID);?></a></h2>

				<div class="srevo-post-meta">
					<?php _e( 'Posted', 'shortcodes-revolution' ); ?>: <?php echo get_the_time( $date_format, $p->ID ); ?>
				</div>

				<div class="srevo-post-excerpt">
					<?php echo get_the_excerpt($p->ID); ?>
				</div>
				
			</div>

		<?php endforeach; ?>

	<?php endif;
	wp_reset_postdata(); ?>

</div>