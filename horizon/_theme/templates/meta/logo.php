<?php
global $options;
$logo_url = wp_get_attachment_image_src( $options['site_logo'], 'logo' );
?>

<a href="<?php echo get_bloginfo( 'url' ); ?>">
	<img alt="<?php echo get_bloginfo( 'name' ); ?>" height="<?php echo $logo_url[2]; ?>"
		 src="<?php echo $logo_url[0]; ?>" width="<?php echo $logo_url[1]; ?>"/>
</a>