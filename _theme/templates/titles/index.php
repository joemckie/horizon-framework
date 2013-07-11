<?php global $post_meta; ?>

<div id="page-header" class="row">
<div class="container">
	<h1><?=$post_meta['page_title'];?></h1>
	
	<?php if($post_meta['page_caption'] != ""){ ?>
		<p><?=$post_meta['page_caption'];?></p>
	<?php } ?>
	</div>
</div>