<?php global $post_meta, $options; ?>

<div class="single-blog-post XXXX-style">
	<div class="twelve columns">
	    <div class="blog-item">
	        <div class="blog-content">
	
				<?php if($post_meta['show_post_info'] == "Yes") {
					get_template_part( TEMPLATE_PATH.'/blog/single-post/'.BLOG_SINGLE_STYLE.'/post-info' );
				} ?>
	
				<div class="blog-title">
					<h2><?=get_the_title();?></h2>
				</div>		
					    
				<div class="blog-thumbnail">
					<?php get_template_part( TEMPLATE_PATH.'/blog/single-post/'.BLOG_SINGLE_STYLE.'/thumbnail' ); ?>
				</div>
				
				<?php echo the_content(); ?>
					
	        </div>
	        
			<?php if($post_meta['show_author_description'] == "Yes") {
				get_template_part( TEMPLATE_PATH.'/blog/single-post/'.BLOG_SINGLE_STYLE.'/author-info' );
			} ?>
	        		
	    </div>
	</div>
	<div class="clear"></div>
</div>
<?php comments_template(); ?>