<?php defined( 'ABSPATH' ) || exit; ?>

<div class="srevo-posts srevo-posts-list">

	<?php if ( $wp_query->have_posts() ) : ?>
		<ul class="srevo-posts-ul">
	 
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

			<li id="srevo-post-id-<?php echo the_ID();?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			
			<?php endwhile; ?>
		</ul>
	<?php endif;
	wp_reset_postdata(); ?>

</div>