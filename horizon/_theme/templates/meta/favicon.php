<?php global $options;

if ( $options['enable_custom_favicon'] == "Yes" ) {
	$icons = array(
		"favicon"                 => wp_get_attachment_image_src( $options['custom_favicon'], array( 16, 16 ) ),
		"apple-touch-icon"        => wp_get_attachment_image_src( $options['custom_favicon'], array( 57, 57 ) ),
		"apple-touch-icon-medium" => wp_get_attachment_image_src( $options['custom_favicon'], array( 72, 72 ) ),
		"apple-touch-icon-large"  => wp_get_attachment_image_src( $options['custom_favicon'], array( 114, 14 ) ),
	);
	echo '<link rel="shortcut icon" href="' . $icons['favicon'][0] . '">';
	echo '<link rel="apple-touch-icon" href="' . $icons['apple-touch-icon'][0] . '">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="' . $icons['apple-touch-icon-medium'][0] . '">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="' . $icons['apple-touch-icon-large'][0] . '">';
} else {
	echo '<link rel="shortcut icon" href="images/favicon.ico">';
}