<?php
global $post_meta, $options;

$title = $post_meta['blog_header'] == "" ? $options['default_blog_post_title'] : $post_meta['blog_header'];
$caption = $post_meta['blog_caption'] == "" ? $options['default_blog_post_caption'] : $post_meta['blog_caption'];

if ( !$title && !$caption ) {
	return;
}

?>

<div id="page-header" class="row">
	<div class="container">
		<h1><?php echo $title ?></h1>

		<?php if ( $caption != "" ) { ?>
			<p><?php echo $caption; ?></p>
		<?php } ?>
	</div>
</div>