<?php global $blog_atts, $meta; ?>

<span>
	<a href="#">
		<div class="avatar-container">
			<?php echo get_avatar(get_the_author_meta('ID'), 35);?>
		</div>
		<?php echo get_the_author();?>
	</a>
</span>
<span>
	<i class="icon-calendar"></i>
	<a href="#"><?php echo get_the_date("F d, Y");?></a>
</span>
<span>
	<i class="icon-comment"></i>
	<a href="<?php echo get_permalink();?>#comments">
		<?php 
			$comments_num = get_comments_number();
			$s = $comments_num == 1 ? "" : "s";
			echo get_comments_number() . ' comment' . $s;
		?>
	</a>
</span>