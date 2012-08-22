<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 모듈설정
	 *
	 * 설치된 모듈들의 정보 불러오기
	 * #todo 모듈이 추가될 때마다 이 파일이 바뀌게끔 또는 어떻게 바꿔야 되는지 알려줘야 됨
	 */

	// LAYOUT ==================================================
	require_once(ROOT_PATH.'app/module/layout/config/module_cfg.layout.php');

	// 메뉴관리 ==================================================
	require_once(ROOT_PATH.'app/module/menu/config/module_cfg.menu.php');

	// AUTH ==================================================
	require_once(ROOT_PATH.'app/module/auth/config/module_cfg.auth.php');

	// AUTH ==================================================
	require_once(ROOT_PATH.'app/module/mapc/config/module_cfg.mapc.php');

/*
	// 달력 ==================================================
	@require_once($PATH['core']['config'].'module_cfg.calendar.php');

	// 위키 ==================================================
	@require_once($PATH['core']['config'].'module_cfg.wiki.php');

	// 입출금 ==================================================
	@require_once($PATH['core']['config'].'module_cfg.trans.php');

	// SBT ==================================================
	@require_once($PATH['core']['config'].'module_cfg.sbt.php');
*/

// end of file
