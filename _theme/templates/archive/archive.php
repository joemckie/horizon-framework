<?php 
	global $options, $archive_type, $style, $archive_post_meta;
	switch($archive_type) {
		case "blog": $style = BLOG_ARCHIVE_STYLE; break;
		case "portfolio": $style = PORTFOLIO_ARCHIVE_STYLE; break;
	}
?>

<div class="search_results <?=$archive_type;?>-results <?=$style;?>-style">

	<?php 
		if(have_posts()){
		
			get_template_part( TEMPLATE_PATH. '/'.$archive_type.'/archive/'.$style.'/before-'.$archive_type );
		
	    	while(have_posts()): 
	    		the_post();
	    		do_action('horizon_get_post_meta', 'archive_post_meta');
	    		
	    		get_template_part( TEMPLATE_PATH.'/archive/archive-item' );
			endwhile;
			
			get_template_part( TEMPLATE_PATH. '/'.$archive_type.'/archive/'.$style.'/after-'.$archive_type );
			
		} else {
	    	echo 'Sorry, no search results matched your terms.';
		}
	?>
</div>

<?php 
	if(have_posts()){
		do_action( 'horizon_pagination' );
	}
?>
