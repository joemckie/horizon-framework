<?php global $options; ?>

<h4><a href="<?php echo get_permalink();?>"><?php echo get_the_title();?></a></h4>

<?php 
	if($options['default_search_content_display'] == "content"){$content = get_the_content();} 
	else {$content = get_the_excerpt();}
	
	if($options['default_search_term_highlight'] == "highlight"){
		$content = apply_filters('horizon_search_highlight_text', $content);
	} else if ($options['default_search_term_highlight'] == "bold") {
		$content = apply_filters('horizon_search_bold_text', $content);
	} else {
		$content = horizon_filter_content(apply_filters('horizon_focus_search_keyword', $content));
	}
	
	 
	if($content == ""){echo '<p>Sorry, no '.$options['default_search_content_display'].' is available for this post.</p>';} 
	else {echo $content;}
?>