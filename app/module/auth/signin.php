<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 로그인
	 */

	require(SYS_PATH.'inc/init.common.head.php');
	{ // Model : Head

		$section_data['signin_proc_url'] = $URL['auth']['signin_proc'];

	} // Model : Tail
	require(SYS_PATH.'inc/init.common.tail.php');

	// ======================================================================

	{ // View : Head

		$section = pfw_file_get_contents($TPL['auth'].'signin.tpl.php', $section_data);

		$pub_option['form'] = TRUE;
		include_once(APP_PATH.'library/pub.proc.php');

	} // View : Tail

// end of file
