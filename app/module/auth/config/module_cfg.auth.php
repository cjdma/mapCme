<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 모듈정보
	 *
	 * 'req'  이 모듈을 설치하기 위해 필요한 상위모듈
	 *     ie. $CFG_MODL['bbs']['req'] = 'auth';
	 * 'ver'  버전
	 *     ie. $CFG_MODL['bbs']['ver'] = '0.0.1';
	 * 'path' 프로그램이 설치된 디렉토리 
	 * 'menu' 메뉴, 이 모듈을 설치하면 사용할 수 있는 모듈들의 접근URL
	 */

	// 이 모듈을 사용하기 위해 필요한 상위모듈
	$CFG_MODL['auth']['req'][] = '';

	// 모듈버전
	$CFG_MODL['auth']['ver'] = '0.0.1';

	// 설치된 경로
	$CFG_MODL['auth']['path']	= APP_PATH.'module/auth/';

	/**
	 * 프로그램 위치정보
	 */

	$MODULE_AUTH_PATH['controller'] = $CFG_MODL['auth']['path'];
	$MODULE_AUTH_PATH['config']     = $CFG_MODL['auth']['path'].'config/';
	$MODULE_AUTH_PATH['model']      = $CFG_MODL['auth']['path'].'model/';
	$MODULE_AUTH_PATH['view']       = $CFG_MODL['auth']['path'].'view/';

	$MODULE_AUTH_URL['join']          = $URL['root'].'?modl=auth&link=join';
	$MODULE_AUTH_URL['join_proc']     = $URL['root'].'?modl=auth&link=join_proc';
	$MODULE_AUTH_URL['leave']         = $URL['root'].'?modl=auth&link=leave';
	$MODULE_AUTH_URL['signin']        = $URL['root'].'?modl=auth&link=signin';
	$MODULE_AUTH_URL['signin_proc']   = $URL['root'].'?modl=auth&link=signin_proc';
	$MODULE_AUTH_URL['signout']       = $URL['root'].'?modl=auth&link=signout';
	$MODULE_AUTH_URL['signout_proc']  = $URL['root'].'?modl=auth&link=signout_proc';
	$MODULE_AUTH_URL['memo_send']     = $URL['root'].'?modl=auth&link=memo_send';
	$MODULE_AUTH_URL['memo_send_proc']= $URL['root'].'?modl=auth&link=memo_send_proc';

	// #todo 메인환경설정에서 ROOT값 가져오기
	$TPLU['auth'] = '/pfw/app/module/auth/view/basic/';
	$TPLP['auth'] = $MODULE_AUTH_PATH['view'].'basic/';

	/**
	 * 모듈 환경설정
	 *
	 * 각 모듈별 환경설정이 필요할 경우 이곳에서 설정
	 */

	// 세션값이 없을 때에는 기본값(guest/signout)으로
	// 다른 프로그램과 연동시킬 경우 이 곳의 $_SESSION값 대신 다른 변수로 치환하면 됨
    session_save_path($PATH['sess']);
	session_start();

	$CFG_AUTH = array();
	$CFG_AUTH['user_uid']   = $_SESSION['user_uid']   ? $_SESSION['user_uid']   : '';
	$CFG_AUTH['user_id']    = $_SESSION['user_id']    ? $_SESSION['user_id']    : 'test';
	$CFG_AUTH['user_nick']  = $_SESSION['user_nick']  ? $_SESSION['user_nick']  : '손님';
	$CFG_AUTH['user_level'] = $_SESSION['user_level'] ? $_SESSION['user_level'] : 'ges';
	$CFG_AUTH['group']      = $_SESSION['group']      ? $_SESSION['group']      : 'a01';
	$CFG_AUTH['stat']       = $_SESSION['stat']       ? $_SESSION['stat']       : 'signout';

	// #todo DB에서 $CFG_AUTH['group']값을 기준으로 해당 그룹 환경설정 가져오는 프로그램
	// #todo 아래는 임시로 입출금관리자는 trans라는 아이디로 지정
	$CFG_AUTH['group_trans_admin'] = 'trans';

	$CFG_AUTH['grant']	= array();	// 각 메뉴별 접근권한, init화일(init.head.common.php 따위)에서 SELECT 해옴
 	$CFG_AUTH['conf']	= array();	// 회원이 속해있는 파트너별 설정, init화일에서 지정

	// 메모 기록도 일종의 log화일이므로 log디렉토리에 저장한다.
	$CFG_AUTH['memo_data_file'] = $PATH['log'].'memo_data.php';

	// 익명의 손님도 쪽지를 보낼수 있는지 여부
	$CFG_AUTH['anonymous_memo']= FALSE;

// end of file
