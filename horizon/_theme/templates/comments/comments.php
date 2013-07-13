<?php global $options;

if ( get_comments_number() != 0 ) {
	?>
	<ul id="comments">
		<h2><?php echo horizon_comments_number( 'Comment', 'Comments' ); ?></h2>
		<?php wp_list_comments( "avatar_size=" . $options['comments_avatar_size'] . "&callback=horizon_comment" ); ?>
	</ul>
<?php } ?>

<?php do_action( 'horizon_comment_form' ); ?>