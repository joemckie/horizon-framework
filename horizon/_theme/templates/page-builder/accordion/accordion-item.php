<?php
global $acc_item;
$active = $acc_item->active == "Yes" ? " active" : "";
?>

<h6 class="accordion-title<?php echo $active; ?>" role="tab"><?php echo $acc_item->title; ?></h6>
<div class="accordion-content" role="tabpanel">
	<p><?php echo $acc_item->content; ?></p>
</div>