<?php global $toggle_item; ?>
	
<h6 class="toggle-title <?php echo $toggle_item->active;?>" role="tab"><?php echo $toggle_item->title;?></h6>
<div class="toggle-content <?php echo $toggle_item->active;?>" role="tabpanel">
	<p><?php echo $toggle_item->content;?></p>
</div>