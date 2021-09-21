<?php defined( 'ABSPATH' ) || exit; ?>

<div class="srevo-comments srevo-comments-list">

	<?php if ( $comments ) : ?>
		<div class="srevo-comments-ul">
	 
			<?php foreach ( $comments as $comment ): ?>

			<div id="srevo-comment-id-<?php echo $comment->ID;?>">
				<div class="srevo-comment-author">
					<?php echo get_avatar( $comment );?> <br>
					
					<b><?php printf(__('%1$s on %2$s:', 'shortcode-revolution'), $comment->comment_author, get_comment_date('', $comment->comment_ID));?></b>
					
				</div>
				<div class="srevo-comment-content">
					<?php echo apply_filters('the_content', $comment->comment_content);?>
				</div>
				
			</div>
			
			<?php endforeach; ?>
		</div>
	<?php endif;?>

</div>