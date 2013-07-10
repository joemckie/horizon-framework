<?php 
global $acc_item;
$active = $acc_item->active == "Yes" ? " active" : "";
 ?>

<h6 class="accordion-title<?= $active;?>" role="tab"><?=$acc_item->title;?></h6>
<div class="accordion-content" role="tabpanel">
	<p><?=$acc_item->content;?></p>
</div>