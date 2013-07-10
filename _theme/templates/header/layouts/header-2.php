<?php global $options; ?>

<nav class="alpha five columns top-menu menu-left">
	<?php get_template_part( TEMPLATE_PATH.'/header/menu', 'left' ); ?>
</nav>
<div class="two columns" id="logo">
	<?php get_template_part( TEMPLATE_PATH.'/header/logo' ); ?>
</div>
<nav class="five columns omega top-menu menu-right">
	<?php get_template_part( TEMPLATE_PATH.'/header/menu', 'right' ); ?>
</nav>