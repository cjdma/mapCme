<?php
	if(!defined('__MAPC__')) { exit(); }
echo 'asdf';
	/**
	 * {페이지 설명}
	 */

	require(SYS_PATH.'inc/init.common.head.php');
	{ // Model : Head

		$userid     = $_POST['userid'];
		$userpasswd = $_POST['userpass'];

		require_once($PATH['auth']['model'] .'auth_signin.func.php');
		require_once($PATH['auth']['config'].'lang.module.auth.'.$CFG['lang'].'.php');

		$signin = pfw_auth_signin($userid, $userpasswd);

		// 로그인하기 전에 있던 곳의 URL 없을 경우에는 메인으로
		if($signin['result'] !== FALSE) {
			$msg  = $LANG['core']['suc_signin'];
			$move = (!empty($_REQUEST['bf'])) ? $_REQUEST['bf'] : $URL['main'];
		} else {
			$msg = $LANG['core']['err_signin'];
			$move = 'refresh';
		}

	} // Model : Tail
	require(SYS_PATH.'inc/init.common.tail.php');

	// ======================================================================

	{ // View : Head

		include_once(SYS_PATH.'lib/js.message.func.php');

		$head = jsMessage($msg, $move);

		include($TPL['core'].'layout.tpl.php');

	} // View : Tail
?>
