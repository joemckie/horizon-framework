<?php global $options; ?>

<div class="search_results">
	<?php
		if(have_posts()){
        	while(have_posts()): the_post();
        		get_template_part( TEMPLATE_PATH.'/search/search-item' );
			endwhile;
    	} else {
        	echo 'Sorry, no search results matched your terms.';
    	}
	?>
</div>

<?php if(have_posts()){
	do_action( 'horizon_pagination' );
} ?>
