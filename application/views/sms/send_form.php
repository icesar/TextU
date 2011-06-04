<h2>Send an SMS for Free</h2>

<p>We are only able to support <strong>USA & Canada</strong> carriers for now. Also, we have not yet implemented a reply interface, but it's coming :)</p>

<?php if($errors) : foreach($errors as $error) : ?>
	<div class="error"><?php echo $error; ?></div>
<?php endforeach;endif; ?>

<?php if($message): ?>
	<div class="message"><?php echo $message; ?></div>
<?php endif; ?>

<?php

	$captcha = new Recaptcha;
	
	echo Form::open('sms/sent', array('id'=>'sms_send'));
	
	echo form::label('sms_phone', 'Phone');
	echo form::input('sms_phone');
		
	echo '<div id="char_limit"></div>';
	echo form::label('sms_message', 'Message');
	echo form::textarea('sms_message', '', array('id'=>'sms_message'));
	
	echo $captcha->get_html();

	echo '<span class="note">We are here to help you connect. We do not tolerate harassment, spam, or unsolicited messaging and immediately ban any user involved in these activities.</span>';
		
	echo form::submit('sms_submit', 'I accept. Send it!');
	
	echo Form::close();
?>

