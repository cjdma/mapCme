<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 로그아웃
	 */

	require(SYS_PATH.'inc/init.common.head.php');
	{ // Model : Head

		require_once($PATH['auth']['config'].'lang.module.auth.'.$CFG['lang'].'.php');

		$msg  = $LANG['core']['suc_signout'];
		$move = (!empty($_REQUEST['bf'])) ? $_REQUEST['bf'] : $URL['main'];

		session_destroy();

	} // Model : Tail
	require(SYS_PATH.'inc/init.common.tail.php');

	// ======================================================================

	{ // View : Head

		include_once(SYS_PATH.'lib/js.message.func.php');

		$head = jsMessage($msg, $move);

		include($TPL['core'].'layout.tpl.php');

	} // View : Tail
?>

