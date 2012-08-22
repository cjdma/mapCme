<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 쪽지 보내기 처리
	 */

	require(SYS_PATH.'inc/init.common.head.php');
	{ // Model : Head

		{ // BLOCK:check_var:20110503:입력값체크
	
			$changed_post = pfw_common_check_var($_POST);

		} // BLOCK

		{ // BLOCK:init:2011050301:초기화

			require_once($PATH['auth']['config'].'lang.module.auth.'.$CFG['lang'].'.php');
			require_once($PATH['auth']['model'] .'auth_memo_send.func.php');

			// 에러가 발생할 경우 $err에 값이 들어감
			$err = '';

		} // BLOCK

		{ // BLOCK:check_input:2011050301:입력값 체크

			// 로그인 했을 때에는 보내는 사람이름을 {$사용자정보}에 있는 이름으로 입력
			if($CFG_AUTH['stat'] == 'signin') {

				$send_nick = $g_user['u_nick'];

			// 로그아웃인 상태의 사용자가 쪽지 보내기하려고 할때 아무나 쪽지 보내기 설정이 허용일때만 통과
			} elseif($CFG_AUTH['stat'] == 'signout' && $CFG_AUTH['anonymous_memo'] === TRUE) {
				
				$send_nick = $changed_post['send_nick'];

			} else {

				$msg = $LANG['auth']['err_ano_smemo'];
				$err = 'not_allow_anonymous';

			}

		} // BLOCK

		// $err(에러코드)가 없을 경우에만 쪽지 보내기
		if(empty($err))
		{ // BLOCK:memo_send:2011050301:쪽지보내기 처리
	
				$param['send_nick'] = $send_nick;
				$param['send_id']   = $CFG_AUTH['user_id'];
				$param['recv_id']   = $changed_post['recv_id'];
				$param['memo']      = $changed_post['memo'];

				$result = pfw_auth_memo_send($param);

		} // BLOCK

		{ // BLOCK:result:2011050301:결과처리

			if($result === TRUE && empty($err)) {

				$msg = $LANG['auth']['suc_memo_send'];

			} else {

				$msg = $LANG['auth']['err_memo_send'];

			}

			$move = 'refresh';

		} // BLOCK

	} // Model : Tail
	require(SYS_PATH.'inc/init.common.tail.php');

	// ======================================================================

	{ // View : Head

		include_once(SYS_PATH.'lib/js.message.func.php');

		$head = jsMessage($msg, $move);

		include($TPL['core'].'layout_content.tpl.php');

	} // View : Tail
?>

