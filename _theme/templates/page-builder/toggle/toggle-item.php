<?php global $toggle_item; ?>
	
<h6 class="toggle-title <?=$toggle_item->active;?>" role="tab"><?=$toggle_item->title;?></h6>
<div class="toggle-content <?=$toggle_item->active;?>" role="tabpanel">
	<p><?=$toggle_item->content;?></p>
</div>