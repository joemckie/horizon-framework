<?php
	global $comment_args;	
	$args = $comment_args['args'];
	$depth = $comment_args['depth'];
	
	$GLOBALS['comment'] = $comment;
	
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ) {$tag = 'div'; $add_below = 'comment';} 
	else {$tag = 'li';$add_below = 'div-comment';}
?>

		<<?=$tag;?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
			<?php if ( $args['style'] != 'div' ) : ?>
				<div id="div-comment-<?php comment_ID() ?>">
			<?php endif; ?>
			<div class="horizon-comment">
				<div class="comment-author-avatar">
					<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<div class="clear"></div>
				</div>
				<div class="comment-body">
					<div class="comment-author vcard">
						<?php printf(__('<h6 class="fn">%s</h6>'), get_comment_author()) ?>
					</div>
					<?php if ($comment->comment_approved == '0') : ?>
							<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
							<br />
					<?php endif; ?>
			
					<?php comment_text(); ?>
					
					<div class="comment-meta commentmetadata">
						<?php 
							/* translators: 1: date, 2: time */
							printf( __('%3$s <span>//</span> %1$s @ %2$s'), get_comment_date(),  get_comment_time(), get_comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="icon-reply"></i> Reply')))) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
						?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		<?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>