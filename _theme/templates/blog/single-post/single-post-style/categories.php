<div class="post-info">
	<?php if(get_the_category($post->ID)){ ?>
		<div class="categories">
			<span class="bg">Category</span><?php 
				foreach(get_the_category($post->ID) as $category){
					echo '<a class="category" href="'.get_category_link($category->term_id).'">'.$category->name.'</a>';
				} 
			?>
		</div>
	<?php } ?>
	<?php if(wp_get_post_tags($post->ID)) { ?>
		<div class="tags">
			<span class="bg">Tags</span><?php 
				foreach(wp_get_post_tags($post->ID) as $tag){
					echo '<a class="tag" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
				} 
			?>
		</div>
	<?php } ?>
</div>