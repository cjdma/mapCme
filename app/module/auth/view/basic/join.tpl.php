회원가입

<?php echo '<iframe id="proc_jg4a" name="proc_jg4a" width="800" height="200"></iframe>'; ?>

<?php echo '<form method="post" action="'.$url['auth']['join_proc'].'" target="proc_jg4a">'; ?>
	<label for="user_id">
		<?php echo $lang['auth']['user_id']; ?>
	</label>
	<input type="text" name="user_id" value="" />

	<br />

	<label for="user_passwd">
		<?php echo $lang['auth']['user_passwd']; ?>
	</label>
	<input type="password" name="user_passwd" value="" />

	<br />

	<label for="user_passwd_check">
		<?php echo $lang['auth']['user_passwd_check']; ?>
	</label>
	<input type="password" name="user_passwd_check" value="" />

	<br />

	<label for="user_email">
		<?php echo $lang['auth']['user_email']; ?>
	</label>
	<input type="text" name="user_email" value="" />

	<br />

	<input type="submit" value="<?php echo $lang['core']['submit']; ?>" />
<?php echo '</form>'; ?>
