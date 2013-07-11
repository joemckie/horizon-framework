<?php
global $attributes, $children, $acc_item;
extract($attributes);
$header = (string)$header;
?>

<?php if($header !== ""){?> <h3><?php echo $header;?></h3> <?php }?>
<div class="accordion-trigger horizon-accordion" role="tablist">
	<?php
		foreach($children as $acc_item){
			if($acc_item->getName() == "acc_item"){
				echo get_template_part( TEMPLATE_PATH.'/page-builder/accordion/accordion-item' );
			}
		}
	?>
</div>