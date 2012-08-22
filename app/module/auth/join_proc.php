<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 회원가입 처리
 */

require(SYS_PATH.'inc/init.common.head.php');
{ // Model : Head

	$param['u_nick']   = $_POST['user_nick'];
	$param['u_passwd'] = $_POST['user_passwd'];
	$param['u_passwd_check'] = $_POST['user_passwd_check'];
	$param['u_email']  = $_POST['user_email'];

	// 로그인 하지 않은 사용자는 새로 가입
	if($CFG_AUTH['stat'] == 'signout') {

		$param['proc'] = 'join';

		$param['u_id'] = $_POST['user_id'];

	// 로그인 한 사용자는 회원정보 수정
	} else {

		$param['proc'] = 'edit';
		
	}

	$result = pfw_auth_edit($param);

} // Model : Tail
require(SYS_PATH.'inc/init.common.tail.php');

// ======================================================================

{ // View : Head

	include_once(SYS_PATH.'lib/js.message.func.php');

	$head = jsMessage($msg, 'refresh');

	include($TPL['core'].'layout_content.tpl.php');

} // View : Tail

// end of file
