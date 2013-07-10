<?php 
global $post_slider_atts, $meta, $post_meta;
extract($post_slider_atts);
?>

<li>
	<div class="container">
		<div class="post-item" style="height:<?=$height;?>px; max-width:<?=$width;?>px">
			<div class="post-content">
				<div class="post-title">
					<h2><a href="<?=get_permalink();?>"><?=get_the_title();?></a></h2>
				</div>
				
				<div class="post-image">
					<?php get_template_part( TEMPLATE_PATH.'/post-slider/image' ); ?>
				</div>
				
				<?php echo horizon_filter_content(get_the_excerpt(), true); ?>
				
				<div class="post-info">
					<?php get_template_part( TEMPLATE_PATH.'/post-slider/info' ); ?>
				</div>
			</div>
		</div>
	</div>
</li>