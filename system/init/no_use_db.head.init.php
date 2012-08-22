<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * DB를 쓰지 않는 페이지에서 include하는 init.head(초기화)머리화일
	 */

	// 환경설정
	require_once(ROOT_PATH.'system/config/cfg.php');
	require_once(ROOT_PATH.'system/config/cfg.module.php');

	// 언어화일 include(cfg.php 에서 설정한 언어의 파일 불러오기)
	require_once(ROOT_PATH.'system/language/'.$CFG['lang'].'.php');

	// 기본함수 호출
	require_once(ROOT_PATH.'system/library/common.func.php');
	require_once(ROOT_PATH.'system/library/file.func.php');

// this is it
