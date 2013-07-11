<?php global $post_meta, $options; ?>

<div class="single-portfolio-post horizon-style">
    <div class="portfolio-item">
        <div class="portfolio-content">

			<?php get_template_part( TEMPLATE_PATH.'/portfolio/single-post/'.PORTFOLIO_SINGLE_STYLE.'/title' ); ?>

			<div class="portfolio-thumbnail clearfix">
				<?php get_template_part( TEMPLATE_PATH.'/portfolio/single-post/'.PORTFOLIO_SINGLE_STYLE.'/thumbnail' ); ?>
			</div>
						
    		<?php get_template_part( TEMPLATE_PATH.'/portfolio/single-post/'.PORTFOLIO_SINGLE_STYLE.'/project-info' ); ?>
			
			<?php get_template_part( TEMPLATE_PATH.'/portfolio/single-post/'.PORTFOLIO_SINGLE_STYLE.'/images' ); ?>
			
			<div><?php the_content();?></div>
			
        </div>
    </div>
	<div class="clear"></div>
</div>
<?php //comments_template(); ?>