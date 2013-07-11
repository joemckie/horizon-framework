<?php
global $post_meta, $options;

$title = $post_meta['portfolio_header'] == "" ? $options['default_portfolio_post_title'] : $post_meta['portfolio_header'];
$caption = $post_meta['portfolio_caption'] == "" ? $options['default_portfolio_post_caption'] : $post_meta['portfolio_caption'];

if ( !$title && !$caption ) {
	return;
}

?>

<div id="page-header">
	<div class="container">
		<div class="twelve columns">
			<h1><?php echo $title ?></h1>

			<?php if ( $caption != "" ) { ?>
				<p><?php echo $caption; ?></p>
			<?php } ?>
		</div>
	</div>
</div>