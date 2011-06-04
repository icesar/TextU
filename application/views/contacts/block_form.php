<h2>Block Your Number</h2>

<p>Block your number below. Sorry for any inconvenience.</p>

<?php if($errors) : foreach($errors as $error) : ?>
	<div class="error"><?php echo $error; ?></div>
<?php endforeach;endif; ?>

<?php if($message): ?>
	<div class="message"><?php echo $message; ?></div>
<?php endif; ?>

<?php

	echo Form::open('contacts/block', array('id'=>'contacts_block'));
	echo form::label('block_phone', 'Phone Number');
	echo form::input('block_phone');
	echo form::submit('block_submit', 'Block');
	echo Form::close();

?>

<p><small>To re-activate your number, please <a href="/page/contact/">send us an email</a>.</small></p>