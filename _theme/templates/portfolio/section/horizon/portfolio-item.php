<?php global $portfolio_atts, $meta, $post_meta; ?>

<div class="<?php echo $meta['alpha'] . $meta['omega'] . $meta['size'];?> columns">
	<div class="portfolio-item">
		<div class="portfolio-content">	
			<div class="portfolio-thumbnail">
				<?php get_template_part( TEMPLATE_PATH.'/portfolio/section/'.PORTFOLIO_STYLE.'/thumbnail' ); ?>
			</div>
			<?php get_template_part( TEMPLATE_PATH.'/portfolio/section/'.PORTFOLIO_STYLE.'/post-info' ); ?>
		</div>
	</div>
</div>