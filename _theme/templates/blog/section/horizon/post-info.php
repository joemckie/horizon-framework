<?php
global $post_meta; 
$category = get_the_category();
$day = get_the_date('d');
$month = get_the_date('M');
$year = get_the_date('Y');	

$archive_month = get_the_date('m')
?>

<div class="post-info">
	<a href="<?php echo get_month_link($year, $archive_month);?>" class="post-icon date">
		<span class="day"><?php echo $day;?></span>
		<span class="month"><?php echo $month;?></span>
	</a> 
	<a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" class="post-icon author">
		<i class="icon-user"></i>
		<span class="tooltip"><?php echo get_the_author();?></span>
	</a> 
	<a href="<?php echo get_category_link($category[0]->term_id);?>" class="post-icon category">
		<i class="icon-inbox"></i>
		<span class="tooltip"><?php echo $category[0]->cat_name;?></span>
	</a>
	<a href="<?php echo get_permalink();?>#comments" class="post-icon pagelink comments">
		<i class="icon-comments"></i>
		<span class="tooltip"><?php echo horizon_comments_number('Comment', 'Comments');?></span>
	</a> 
</div>