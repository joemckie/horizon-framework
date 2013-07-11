<?php 
global $post_meta;
if($post_meta['client_name'] == NULL && $post_meta['client_website'] == NULL && $post_meta['services_provided'] == NULL) {return;}

$post_tags = get_the_terms($post->ID, 'portfolio-tag');
if($post_tags){
	foreach($post_tags as $tag) {
		$tags[] = $tag;
	}
}
?>

<div class="project-info mb20">
	<div class="client-info mb10">
	<?php
		if($post_meta['client_name'] != NULL){
			echo '<div><i class="icon-user"></i> <span class="font-weight-normal">Client:</span> '.$post_meta['client_name'].'</div>';
		}
		if($post_meta['client_website'] != NULL){
			echo '<div><i class="icon-link"></i> <span class="font-weight-normal">Website:</span> <a href="'.$post_meta['client_website'].'" target="_blank">'.$post_meta['client_website'].'</a></div>';
		}
	?>
	</div>
	<div class="portfolio-tags mb10">
	<?php
		if($tags) {
			echo '<i class="icon-tag"></i> <span class="font-weight-normal">Tagged:</span> ' . horizon_format_tags($tags, false);
		}
	?>
	</div>
	<div class="services">
		<?php
			if($post_meta['services_provided'] != NULL){
				echo '<div><i class="icon-wrench"></i> <span class="font-weight-normal">Services Provided:</span> '.$post_meta['services_provided'].'</div>';
			}
		?>
	</div>
</div>