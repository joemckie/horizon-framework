<?php
global $attributes, $children;
extract($attributes);
$num_tabs = sizeof($children);
?>

<div class="tabs-trigger horizon-tabs">
	<ul class="tabs-nav clearfix" role="tablist">
		<?php for($i=0; $i<$num_tabs; $i++){
			if($i==0){$active = ' active';} else {$active = '';} ?>
			<li class="tab-<?php echo $i;?> <?php echo $active;?>">
				<a href="#tab-<?php echo $i;?>"><?php echo $children[$i]->title;?></a>
			</li>
		<?php } ?>
	</ul>
	
	<div class="tabs-content clearfix">
		<?php for($i=0; $i<$num_tabs; $i++){ ?>
			<div id="tab-<?php echo $i;?>" class="tabs-inner clearfix" role="tabpanel">
				<?php
					$content = apply_filters('horizon_decode_xml_string', $children[$i]->content);
					echo do_shortcode($content);
				?>
			</div>
		<?php } ?>
	</div>
</div>