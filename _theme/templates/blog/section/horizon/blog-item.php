<?php global $blog_atts, $meta, $post_meta; ?>

<div class="blog-item">
	<div class="blog-content">
		<div class="blog-title">
			<h2><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h2>
		</div>
		
		<?php get_template_part( TEMPLATE_PATH.'/blog/section/revelio/post-info' ); ?>
		
		<div class="blog-thumbnail">
			<?php get_template_part( TEMPLATE_PATH.'/blog/section/revelio/thumbnail' ); ?>
		</div>
		
		<?php echo horizon_filter_content(get_the_excerpt()); ?>
	</div>
</div>