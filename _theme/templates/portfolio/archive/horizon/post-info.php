<?php
global $post_meta; 
$category = get_the_category();
$day = get_the_date('d');
$month = get_the_date('M');
$year = get_the_date('Y');	

$archive_month = get_the_date('m')
?>

<div class="post-info">
	<a href="<?=get_month_link($year, $archive_month);?>" class="date"> 
		<span class="day"><?=$day;?></span>
		<span class="month"><?=$month;?></span> 
	</a> 
	<a href="<?=get_author_posts_url(get_the_author_meta('ID'));?>" class="author">
		<span class="tooltip"><?=get_the_author();?></span>
	</a> 
	<a href="<?=get_category_link($category[0]->term_id);?>" class="category">
		<span class="tooltip"><?=$category[0]->cat_name;?></span>
	</a>
	<a href="<?=get_permalink();?>#comments" class="pagelink comments">
		<span class="tooltip"><?=horizon_comments_number('Comment', 'Comments');?></span>
	</a> 
</div>