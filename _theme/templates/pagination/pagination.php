<?php global $portfolio_query, $blog_query;

$query_types = array( "blog_query", "portfolio_query", "wp_query" );
foreach ( $query_types as $query_type ) {
	if ( !is_null( $$query_type ) && !isset( $pagination_query ) ) {
		$pagination_query = $$query_type;
	}
}

$page_num = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$prev_link = $page_num == 1 ? "#" : get_previous_posts_page_link();
$next_link = $page_num < $pagination_query->max_num_pages ? get_next_posts_page_link() : "#";

?>
<div class="clear"></div>
<div class="clearfix pagination">
	<div class="left"><?php if ( $next_link !== "#" ) {
			echo '<a class="next_pagination" href="' . $next_link . '">&raquo;</a>';
		} ?></div>
	<div class="right"><?php if ( $prev_link !== "#" ) {
			echo '<a class="prev_pagination" href="' . $prev_link . '">&laquo;</a>';
		} ?></div>
</div>