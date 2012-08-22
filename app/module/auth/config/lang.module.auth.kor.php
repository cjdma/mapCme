<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 언어설정
	 *
     * $LANG['var']	= '4byte이상의 낱말' - '일반 낱말';
     * $LANG['suc_.....']	= '성공을 알리는 메시지';
     * $LANG['err_.....']	= '에러를 알리는 메시지';
     * $LANG['ask_.....']	= '확인메시지';
     * $LANG['alt_.....']	= '알림메시지';
	 */

	$LANG = isset($LANG) ? $LANG : array();

	$LANG['auth']['suc_signin']  = '로그인 되었습니다.';
	$LANG['auth']['err_signin']  = '로그인 중 에러가 발생했습니다.';
	$LANG['auth']['suc_signout'] = '로그아웃 되었습니다.';
	$LANG['auth']['suc_memo_send'] = '쪽지를 보냈습니다.';
	$LANG['auth']['err_memo_send'] = '쪽지 보내기를 실패했습니다.';
	$LANG['auth']['err_ano_smemo'] = '로그인 하신 이후에 쪽지를 보내실 수 있습니다.';

	$LANG['auth']['user_id']     = '아이디';
	$LANG['auth']['user_passwd'] = '암호';
	$LANG['auth']['user_passwd_check'] = '암호확인';
	$LANG['auth']['user_email']  = '이메일';

// end of file
