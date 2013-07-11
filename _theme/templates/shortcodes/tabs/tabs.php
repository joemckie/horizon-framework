<?php
global $shortcode_atts, $all_tabs;

extract( shortcode_atts( array(
), $shortcode_atts['atts'] ) );

$i=0;
do_shortcode($shortcode_atts['content']);
$num_tabs = sizeof($all_tabs);
?>

<div class="tabs-trigger horizon-tabs">
	<ul class="tabs-nav clearfix" role="tablist">
		<?php for($i=0; $i<$num_tabs; $i++){
			if($i==0){$active = ' active';} else {$active = '';} ?>
			<li class="tab-<?php echo $i;?> <?php echo $active;?>">
				<a href="#tab-<?php echo $i;?>"><?php echo $all_tabs[$i]['title'];?></a>
			</li>
		<?php } ?>
	</ul>
	
	<div class="tabs-content clearfix">
		<?php for($i=0; $i<$num_tabs; $i++){ ?>
			<div id="tab-<?php echo $i;?>" class="tabs-inner" role="tabpanel">
				<?php echo $all_tabs[$i]['content'];?>
			</div>
		<?php } ?>
	</div>
</div>