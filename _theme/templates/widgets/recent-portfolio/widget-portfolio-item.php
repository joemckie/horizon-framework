<?php $thumbnail = get_the_post_thumbnail($post->ID, 'tiny_thumbnail'); ?>
<div class="portfolio-item">
	<div class="portfolio-image">
		<a href="<?php echo get_permalink();?>">
			<?php if($thumbnail !== '') {
				echo $thumbnail;
			} else {
				echo '<img width="65" height="65" src="'.ROOT .'/'. TEMPLATE_PATH .'/widgets/recent-portfolio/images/no-featured-image.png" />';
			} ?>
		</a>
	</div>
</div>