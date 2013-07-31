<?php
global $attributes, $in_section, $no_end;
$in_section = true;
$no_end = true;
extract( $attributes );

$image = empty($image) ? 'none' : $image;
$repeat = $repeat == 'No' ? 'no-repeat' : $repeat;
?>

<div class="horizon-section clearfix force-full-width"
	 style="background-color:<?php echo $background_colour; ?>; background-image:url('<?php echo $image; ?>'); background-attachment:<?php echo $type; ?>; background-repeat:<?php echo $repeat; ?>; background-position:center center; color:<?php echo $colour; ?>">
	<div class="responsive-helper">
		<div class="container">