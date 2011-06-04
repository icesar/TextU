<h2>Send an SMS for Free</h2>

<?php if($errors) : foreach($errors as $error) : ?>
	<div class="error"><?php echo $error; ?></div>
<?php endforeach;endif; ?>

<?php if($message): ?>
	<div class="message"><?php echo $message; ?></div>
<?php endif; ?>

