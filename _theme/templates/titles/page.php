<?php global $post_meta; ?>

<div id="page-header">
	<div class="container">
		<div class="alpha omega twelve columns">
			<h1><?=the_title();?></h1>
			
			<?php if($post_meta['page_caption'] != ""){ ?>
				<p><?=$post_meta['page_caption'];?></p>
			<?php } ?>
		</div>
	</div>
</div>