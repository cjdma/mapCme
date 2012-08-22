<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 모듈정보 - 메뉴설정 모듈
	 *
	 * 'req'  이 모듈을 설치하기 위해 필요한 상위모듈
	 *     ie. $CFG_MODL['bbs']['req'] = 'auth';
	 * 'ver'  버전
	 *     ie. $CFG_MODL['bbs']['ver'] = '0.0.1';
	 * 'path' 프로그램이 설치된 디렉토리 
	 * 'menu' 메뉴, 이 모듈을 설치하면 사용할 수 있는 모듈들의 접근URL
	 */

	// 이 모듈을 사용하기 위해 필요한 상위모듈
	$CFG_MODL['menu']['req'][] = '';

	// 모듈버전
	$CFG_MODL['menu']['ver'] = '0.0.1';

	// 설치된 경로
	$CFG_MODL['menu']['path']	= APP_PATH.'module/menu/';

	/**
	 * 프로그램 경로정보
	 */

	$MODULE_MENU_PATH['config']     = $CFG_MODL['menu']['path'].'config/';
	$MODULE_MENU_PATH['controller'] = $CFG_MODL['menu']['path'].'controller/';
	$MODULE_MENU_PATH['model']      = $CFG_MODL['menu']['path'].'model/';
	$MODULE_MENU_PATH['view']       = $CFG_MODL['menu']['path'].'view/';
	$MODULE_MENU_PATH['data']       = DATA_PATH.'menu/';

	$MODULE_MENU_URL['edit']      = $URL['root'].'index.php?modl=menu&link=edit';
	$MODULE_MENU_URL['edit_proc'] = $URL['root'].'index.php?modl=menu&link=edit_proc';

	$TPLP['menu'] = $MODULE_MENU_PATH['view'].'basic/';

	/**
	 * 모듈 환경설정
	 *
	 * 각 모듈별 환경설정이 필요할 경우 이곳에서 설정
	 */

// end of file
