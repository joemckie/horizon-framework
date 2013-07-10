<?php
global $options;
$logo_url = wp_get_attachment_image_src($options['site_logo'], 'logo');
?>

<a href="<?=get_bloginfo('url');?>">
	<img alt="<?=get_bloginfo( 'name' );?>" height="<?=$logo_url[2];?>" src="<?=$logo_url[0];?>" width="<?=$logo_url[1];?>" />
</a>