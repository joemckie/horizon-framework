<?php
global $post_meta;
do_action( 'horizon_before_content' ); ?>

<?php echo get_sidebar( 'left' ); ?>
	<div
		class="horizon_page_item <?php echo $post_meta['content_meta']['width']; ?> columns <?php echo $post_meta['content_meta']['padding']; ?>">

		<?php
		if ( $post_meta['display_content'] != "No" ) {
			?>
			<div class="row">
				<div class="twelve columns">
					<div class="horizon_page_content">
						<?php echo horizon_filter_content( get_the_content( 'Read More' ) ); ?>
					</div>
				</div>
			</div>
		<?php
		}
		?>

		<div class="row">
			<div class="twelve columns">
				<div class="horizon_page_builder">
					<?php
					if ( $post_meta['page_layout_xml'] != '' ) {
						do_action( 'horizon_page_builder' );
					}
					?>
				</div>
			</div>
		</div>
	</div>
<?php echo get_sidebar( 'right' ); ?>

<?php do_action( 'horizon_after_content' ); ?>