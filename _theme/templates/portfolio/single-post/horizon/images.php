<?php 
global $post_meta;
if($post_meta['project_images'] == NULL) {return;}
?>

<div class="project-images">
	<?php 
		$project_images = horizon_split_image_string($post_meta['project_images']);
		$width = horizon_format_width($post_meta['project_image_size'], 'front-end');
		$image_size = $width.'-columns';
		$num_row = horizon_num_col_row($width);
		$i=1;
		foreach($project_images as $project_image){
			$src = wp_get_attachment_image_src($project_image, $image_size);
			$full_src = wp_get_attachment_image_src($project_image, 'full');
			$alpha = $i==1 ? 'alpha ' : '';
			$omega = $i==$num_row ? 'omega ' : '';
			
			echo '<div class="'. $alpha . $omega . $width .' columns"><a class="lightbox" rel="lightbox[project_images]" href="'.$full_src[0].'"><img src="'.$src[0].'" /></a></div>';
			
			$i = $i==$num_row ? 1 : $i+1;
		}
	?>
</div>