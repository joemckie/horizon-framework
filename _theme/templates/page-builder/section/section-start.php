<?php
global $attributes, $in_section, $no_end;
$in_section = true;
$no_end = true;
extract( $attributes );
?>

<div class="horizon-section clearfix force-full-width"
	 style="background-color:<?php echo $background_colour; ?>; color:<?php echo $colour; ?>">
	<div class="responsive-helper">
		<div class="container">