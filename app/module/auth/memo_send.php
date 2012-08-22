<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 쪽지 보내기
	 */

	require(SYS_PATH.'inc/init.common.head.php');
	{ // Model : Head

		// PROC CODE

	} // Model : Tail
	require(SYS_PATH.'inc/init.common.tail.php');

	// ======================================================================

	{ // View : Head

		$section_data['memo_send_proc_url'] = $URL['auth']['memo_send_proc'];
		$section = pfw_file_get_contents($TPL['auth'].'memo_send.tpl.php', &$section_data);

		include_once(APP_PATH.'library/pub.proc.php');

	} // View : Tail

// this is it
