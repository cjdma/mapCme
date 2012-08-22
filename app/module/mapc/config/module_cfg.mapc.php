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
	$CFG_MODL['mapc']['req'][]	= '';

	// 모듈버전
	$CFG_MODL['mapc']['ver']	= '0.0.1';

	// 설치된 경로
	$CFG_MODL['mapc']['path']	= APP_PATH.'module/mapc/';

	/**
	 * 프로그램 위치정보
	 */

	$MODULE_MAPC_PATH['controller'] = $CFG_MODL['mapc']['path'];
	$MODULE_MAPC_PATH['config']     = $CFG_MODL['mapc']['path'].'config/';
	$MODULE_MAPC_PATH['model']      = $CFG_MODL['mapc']['path'].'model/';
	$MODULE_MAPC_PATH['view']       = $CFG_MODL['mapc']['path'].'view/';
	$MODULE_MAPC_PATH['data']       = DATA_PATH.'mapc/';

	$MODULE_MAPC_URL['edit']		= $URL['root'].'?core_modl=mapc&core_page=edit';
	$MODULE_MAPC_URL['edit_run']	= $URL['root'].'?core_modl=mapc&core_page=edit_run';
	$MODULE_MAPC_URL['view']		= $URL['root'].'?core_modl=mapc&core_page=view';
	$MODULE_MAPC_URL['list']		= $URL['root'].'?core_modl=mapc&core_page=list';

	// #todo 메인환경설정에서 ROOT값 가져오기
	$TPLU['mapc'] = '/pfw/app/module/mapc/view/basic/';
	$TPLP['mapc'] = $MODULE_MAPC_PATH['view'].'basic/';

	/**
	 * 모듈 환경설정
	 *
	 * 각 모듈별 환경설정이 필요할 경우 이곳에서 설정
	 */

// end of file
