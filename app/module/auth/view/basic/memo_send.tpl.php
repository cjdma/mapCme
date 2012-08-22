<?php echo '<iframe id="proc_bkw5" name="proc_bkw5" width="0" height="0" class="proc"></iframe>'; ?>

<?php echo '<form method="post" action="'.$memo_send_proc_url.'" onsubmit="javascript:return formCheck(this);" target="proc_bkw5">'; ?>

	<label for="recv_id">받는 사람</label>
	<input type="text" name="recv_id" />
<br />
	<label for="memo">쪽지내용</label>
	<textarea name="memo"></textarea>
<br />
	<input type="submit" value="submit" />

<?php echo '</form>'; ?>
