<?php if(!comments_open()) {return;} ?>

<div class="horizon-form" id="comment_form">
	<?php 
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$req_class = ( $req ? " required" : '');
			$aria_req = ( $req ? " aria-required='true'" : '' );	
			
			$args = array(
			"comment_notes_after" => "",
			"comment_notes_before" => "",
			"comment_field" => 
				'<div class="input-wrap comment-form-comment">
					<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Message"></textarea>
					<span class="required">*</span>
				</div>',
			"fields" => array(
				'author' => 
					'<div class="input-wrap comment-form-author' . $req_class .'">
						<input id="author" name="author" type="text" placeholder="'.__( 'Name', 'domainreference' ).'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />' .
						( $req ? '<span class="required">*</span>' : '' ) . 
					'</div>',
				'email' => 
					'<div class="input-wrap comment-form-email' . $req_class .'">
						<input id="email" name="email" type="text" placeholder="'.__( 'Email (not published)', 'domainreference' ).'" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />' . 
						( $req ? '<span class="required">*</span>' : '' ) . 
					'</div>',
				'url' => 
					'<div class="input-wrap comment-form-url">
						<input id="url" name="url" type="text" placeholder="'.__( 'Website', 'domainreference' ).'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
					</div>'
			),
			"label_submit" => "Submit Comment"	
		);
		comment_form($args); 
	?>
</div>