<?php
global $attributes;
extract($attributes);

$rounded = $rounded != "No" ? $rounded : "";
?>

<div class="horizon-message <?=strtolower($type) . $rounded; ?>">
	<div class="message-title"><?=$title;?></div>
	<div class="message-content"><?=$content;?></div>
</div>