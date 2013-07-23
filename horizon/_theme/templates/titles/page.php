<?php global $post_meta; ?>

<div id="page-header" class="row">
	<div class="container">
		<div class="twelve columns">
			<h1><?php echo the_title(); ?></h1>

			<?php if ( $post_meta['page_caption'] != "" ) { ?>
				<p><?php echo $post_meta['page_caption']; ?></p>
			<?php } ?>
		</div>
	</div>
</div>