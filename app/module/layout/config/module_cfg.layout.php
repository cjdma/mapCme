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
	 */

	// 이 모듈을 사용하기 위해 필요한 상위모듈
	$CFG_MODL['layout']['req'][]= '';

	// 모듈버전
	$CFG_MODL['layout']['ver']	= '0.0.1';

	// 설치된 경로
	$CFG_MODL['layout']['path']	= APP_PATH.'module/layout/';
	$CFG_MODL['layout']['url']	= $URL['root'].'module/layout/';

	/**
	 * 프로그램 경로정보
	 */

	$MODULE_LAYOUT_PATH['config']     = $CFG_MODL['layout']['path'].'config/';
	$MODULE_LAYOUT_PATH['controller'] = $CFG_MODL['layout']['path'].'controller/';
	$MODULE_LAYOUT_PATH['model']      = $CFG_MODL['layout']['path'].'model/';
	$MODULE_LAYOUT_PATH['view']       = $CFG_MODL['layout']['path'].'view/';

	$MODULE_LAYOUT_URL['view']	= $CFG_MODL['layout']['url'].'view/';

	/**
	 * 모듈 환경설정
	 *
	 * 각 모듈별 환경설정이 필요할 경우 이곳에서 설정
	 */

	$TPLP['layout'] = $MODULE_LAYOUT_PATH['view'].'basic/';
	$TPLU['layout'] = $MODULE_LAYOUT_URL['view'] .'basic/';

// end of file
