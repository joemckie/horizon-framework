<?php global $post_meta;
do_action( 'horizon_before_single' ); ?>

    <div class="<?php echo $post_meta['content_meta']['width'];?> columns <?php echo $post_meta['content_meta']['padding'];?>">
    
        <div class="horizon_page_item">
			<?php do_action( 'horizon_single' ); ?>
        </div>
    </div>
    
<?php do_action( 'horizon_after_single' ); ?>