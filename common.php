<?php
if(!defined('__MAPC__')) { exit(); }
/**
 *
 * 디렉토리 설정, 입력값 처리
 *
 * @example
 *
 *     define('ROOT_PATH', '../../');
 *     include(ROOT_PATH.'common.php');
 *         
 */

{ // BLOCK:path_set:2012080901:경로지정

	define('APP_PATH',  ROOT_PATH.'app/');		// 애플리케이션(프로그램 모음) 디렉토리
	define('MODL_PATH', APP_PATH .'module/');	// 모듈 디렉토리
	define('PAGE_PATH', APP_PATH .'page/');		// 페이지 디렉토리

	define('SYS_PATH',  ROOT_PATH.'system/');
	define('CONF_PATH', SYS_PATH .'config/');
	define('INIT_PATH', SYS_PATH .'init/');
	define('LANG_PATH', SYS_PATH .'language/');
	define('LIB_PATH',  SYS_PATH .'library/');
	define('PROC_PATH', SYS_PATH .'proc/');

	define('DATA_PATH', ROOT_PATH.'data/');
	define('TEMP_PATH', ROOT_PATH.'temp/');

} // BLOCK

{ // BLOCK:nec_var_set:2012080901:입력값 처리

	// 페이지 지정하지 않았을 경우 기본 페이지
	$g_page = isset($_REQUEST['core_page']) ? $_REQUEST['core_page'] : 'dashboard';
	$g_page = htmlspecialchars($g_page);
	$g_modl = isset($_REQUEST['core_modl']) ? $_REQUEST['core_modl'] : '';
	$g_modl = htmlspecialchars($g_modl);
	$g_lang = isset($_REQUEST['core_lang']) ? $_REQUEST['core_lang'] : 'kor';
	$g_lang = htmlspecialchars($g_lang);
	$g_show = isset($_REQUEST['core_show']) ? $_REQUEST['core_show'] : 'html';
	$g_show = htmlspecialchars($g_show);

} // BLOCK

// this is it
