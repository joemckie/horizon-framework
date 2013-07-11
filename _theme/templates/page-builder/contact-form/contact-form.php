<?php
global $attributes, $post;
extract($attributes);

if(isset($_POST['submitted'])){
	// Check name
	if(trim($_POST['page-builder-contact-name']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$sender_name = trim($_POST['page-builder-contact-name']);
	}
	// Check email
	if(trim($_POST['page-builder-contact-email']) === '')  {
			$emailError = 'Please enter your email address.';
			$hasError = true;
		} else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['page-builder-contact-email']))) {
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
		} else {
			$sender_email = trim($_POST['page-builder-contact-email']);
	}	
	// Check message
	if(trim($_POST['page-builder-contact-message']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$sender_message = stripslashes(trim($_POST['page-builder-contact-message']));
		} else {
			$sender_message = trim($_POST['page-builder-contact-message']);
		}
	}
	if(!isset($hasError)) {

		$body = "Name: $sender_name \n\nEmail: $sender_email \n\nComments: $sender_message";
		$headers = 'From: '.$sender_name.' <'.$sender_email.'>' . "\r\n" . 'Reply-To: ' . $sender_email;

		wp_mail((string)$email, (string)$subject, $body, $headers);
		$emailSent = true;
	}		
}
?>

<form action="<?php echo get_permalink();?>" class="horizon-form" id="page-builder-contact-form" method="post">
	<?php
		if(isset($emailSent) && $emailSent == true) {
			echo do_shortcode('[message rounded="true" type="success"]Your message has been successfully sent![/message]');
		}
		if(isset($hasError) || isset($captchaError)) {
			echo do_shortcode('[message rounded="true" type="warning"]Sorry, there was an error sending your message. Please try again later![/message]');
		}
	?>
	<ul>
		<li>
			<div class="input-wrap">
				<input type="text" name="page-builder-contact-name" placeholder="Name" id="pb-name" value="" />
				<span class="required">*</span>
			</div>
		</li>
		<li>
			<div class="input-wrap">
				<input type="text" name="page-builder-contact-email" placeholder="Email" id="page-builder-contact-email" value="" />
				<span class="required">*</span>
			</div>
		</li>
		<li>
			<div class="input-wrap">
				<textarea name="page-builder-contact-message" id="page-builder-contact-message" placeholder="Message" rows="20" cols="30"></textarea>
				<span class="required">*</span>
			</div>
		</li>
		<li>
			<button class="horizon-button" type="submit"><?php echo $button_text;?></button>
		</li>
	</ul>
	<input type="hidden" name="submitted" id="submitted" value="true" />
</form>