<?php 
global $post_meta, $options; 

$title = $post_meta['blog_header'] == "" ? $options['default_blog_post_title'] : $post_meta['blog_header'];
$caption = $post_meta['blog_caption'] == "" ? $options['default_blog_post_caption'] : $post_meta['blog_caption'];

if(!$title && !$caption) {return;}

?>

<div id="page-header" class="row">
	<div class="container">
		<div class="twelve columns alpha omega">
			<h1><?=$title?></h1>
			
			<?php if($caption != ""){ ?>
				<p><?=$caption;?></p>
			<?php } ?>
		</div>
	</div>
</div>