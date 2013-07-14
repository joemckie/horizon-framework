<?php global $post_meta; ?>

<div class="portfolio-item">
	<div class="portfolio-content">
		<div class="portfolio-title">
			<h2><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
		</div>

		<div class="portfolio-thumbnail">
			<?php get_template_part( TEMPLATE_PATH . '/portfolio/archive/' . PORTFOLIO_ARCHIVE_STYLE . '/thumbnail' ); ?>
		</div>

		<?php echo horizon_filter_content( get_the_excerpt() ); ?>
	</div>
</div>