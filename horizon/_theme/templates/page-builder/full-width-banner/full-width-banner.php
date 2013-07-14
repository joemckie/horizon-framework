<?php
global $attributes;
extract( $attributes );
$content = apply_filters( '', str_replace( "&gt;", "<", $content ) );
?>

<div class="force-full-width horizon-full-width-wrapper"
	 style="background-color:<?php echo $wrapper_colour; ?>; color:<?php echo $content_colour; ?>">
	<div class="container">
		<div class="twelve columns">
			<h1 style="color:<?php echo $content_colour; ?>"><?php echo $title; ?></h1>
			<?php echo do_shortcode( $content ); ?>
		</div>
	</div>
</div>