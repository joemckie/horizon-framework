<?php
global $attributes, $children, $toggle_item;
extract($attributes);
?>

<?php if($header !== ""){?> <h3><?php echo $header;?></h3> <?php }?>
<div class="toggle-trigger horizon-toggle" role="tablist">
	<?php foreach($children as $toggle_item) {
		echo get_template_part( TEMPLATE_PATH. '/page-builder/toggle/toggle-item' );
	} ?>
</div>