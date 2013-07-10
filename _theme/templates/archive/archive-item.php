<?php global $options, $archive_type, $style; ?>
<div class="archive-item">
	<?php get_template_part( TEMPLATE_PATH. '/'.$archive_type.'/archive/'.$style.'/'.$archive_type.'-item' ); ?>
</div>