<?php
	if($session['stat'] == 'signin') {
?>

	<?php echo '<iframe id="proc_dkw5" name="proc_dkw5" width="0" height="0" class="proc"></iframe>'; ?>
	<a href="<?php echo $signout_proc_url; ?>" target="proc_dkw5">로그아웃</a>

<?php
	} else {
?>

	<?php echo '<iframe id="proc_dkw5" name="proc_dkw5" width="0" height="0" class="proc"></iframe>'; ?>

	<?php echo '<form method="post" action="'.$signin_proc_url.'" target="proc_dkw5">'; ?>

	아이디 : <input type="text" name="userid" />
	<br />
	암호 : <input type="password" name="userpass" />
	<br />
	<input type="submit" value="submit" />
	
	<?php echo '</form>'; ?>

<?php
	}
?>
