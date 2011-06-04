<h2>Create a New User</h2>

<? if ($message) : ?>
    <h3 class="message">
        <?= $message; ?>
    </h3>
<? endif; ?>
 
<?= Form::open('user/create'); ?>
 
<?= Form::label('username', 'Username'); ?>
<?= Form::input('username', HTML::chars(Arr::get($_POST, 'username'))); ?>

<?php if ( Arr::get($errors, 'username') != '') : ?>
	<div class="error"><?= Arr::get($errors, 'username'); ?></div>
<?php endif; ?>
 
<?= Form::label('email', 'Email Address'); ?>
<?= Form::input('email', HTML::chars(Arr::get($_POST, 'email'))); ?>

<?php if (Arr::get($errors, 'email') != '')  : ?>
	<div class="error"><?= Arr::get($errors, 'email'); ?></div>
<?php endif; ?>
 
<?= Form::label('password', 'Password'); ?>
<?= Form::password('password'); ?>

<?php if (Arr::get($errors, 'password') != '' || Arr::path($errors, '_external.password') != '') : ?>
	<div class="error">
	    <?= Arr::get($errors, 'password'); ?>
		<?= Arr::path($errors, '_external.password'); ?>
	</div>
<?php endif; ?>
 
<?= Form::label('password_confirm', 'Confirm Password'); ?>
<?= Form::password('password_confirm'); ?>

<?php if (Arr::path($errors, '_external.password_confirm') != '') : ?>
	<div class="error"><?= Arr::path($errors, '_external.password_confirm'); ?></div>
<?php endif; ?>

<br />
 
<?= Form::submit('create', 'Create User'); ?>
<?= Form::close(); ?>
 
<p>Or <?= HTML::anchor('user/login', 'login'); ?> if you have an account already.</p>