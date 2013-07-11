<?php
global $attributes;
extract( $attributes );

$rounded = $rounded != "No" ? $rounded : "";
?>

<div class="horizon-message <?php echo strtolower( $type ) . $rounded; ?>">
	<div class="message-title"><?php echo $title; ?></div>
	<div class="message-content"><?php echo $content; ?></div>
</div>