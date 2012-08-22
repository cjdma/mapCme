<?php
/**
 * 화면출력 일괄처리
 *
 * @param
 */

if(!defined('__MAPC__')) { exit(); }

{ // BLOCK:check_var:2011050201:화면 출력에 필요한 값들이 들어왔는지 체크

	$head_data    = isset($head_data)    ? $head_data    : array();
	$header_data  = isset($header_data)  ? $header_data  : array();
	$nav_data     = isset($nav_data)     ? $nav_data     : array();
	$footer_data  = isset($footer_data)  ? $footer_data  : array();
	$section_data = isset($section_data) ? $section_data : array();

	$head    = isset($head)    ? $head    : '';
	$header  = isset($header)  ? $header  : '';
	$nav     = isset($nav)     ? $nav     : '';
	$footer  = isset($footer)  ? $footer  : '';
	$section = isset($section) ? $section : '';

} // BLOCK

{ // BLOCK:check_etc_var:20120515:출력 옵션이 들어왔는지... 없으면 빈 배열

	$pub_option = (isset($pub_option)) ? $pub_option : array();

} // BLOCK

{ // BLOCK:addition_by_option:20110502:옵션값에 따라 HEAD에 필요한 내용을 추가한다.

	// Form을 출력하는 페이지 일 경우 head에 formCheck하는 자바스크립트를 넣는다.
	// 로그아웃 상태일 경우에도 로그인 창이 항상 떠야 하니 TRUE 지정
	if($pub_option['form'] === TRUE || $CFG_AUTH['stat'] == 'signout') {

		$head_data['js']['jquery.min.js'] = TRUE;

	}

} // BLOCK

{ // BLOCK:2011050301:출력에 기본적으로 필요한 변수들 넘김

	$head_data['title']   = isset($head_data['title'])   ? $head_data['title']   : $LANG['core']['sys_title'];
	$head_data['css_url'] = isset($head_data['css_url']) ? $head_data['css_url'] : $TPLU['layout'];
	$head_data['js_url']  = isset($head_data['js_url'])  ? $head_data['js_url']  : $URL['resoc'];

} // BLOCK

{ // BLOCK:2011050201:menu:메뉴 출력

	require_once(APP_PATH.'module/menu/model/menu_convert.func.php');
	include_once($MODULE_MENU_PATH['data'].'menu.main.php');
	include_once($MODULE_MENU_PATH['data'].'menu_title.'.$g_lang.'.php');

	$option = array('menu_class' => 'navmenu');
	$nav_data['menu'] = pfw_menu_convert($MENU['sitemap'], $option);

} // BLOCK

{ // BLOCK:2011050201:sidebar:Sidebar 출력

	$aside_data['signin_proc_url']  = $MODULE_AUTH_URL['auth']['signin_proc'];
	$aside_data['signout_proc_url'] = $MODULE_AUTH_URL['auth']['signout_proc'];
	$aside_data['session']          = $CFG_AUTH;
	$aside = pfw_file_get_contents($TPLP['auth'].'signin.tpl.php', $aside_data);

} // BLOCK

{ // BLOCK:2011050201:here_we_go:실제 스킨화일들 include

	$head   .= pfw_file_get_contents($TPLP['layout'].'head.tpl.php',   $head_data);
	$header .= pfw_file_get_contents($TPLP['layout'].'header.tpl.php', $header_data);
	$nav    .= pfw_file_get_contents($TPLP['layout'].'nav.tpl.php',    $nav_data);
	$aside  .= pfw_file_get_contents($TPLP['layout'].'aside.tpl.php',  $aside_data);
	$footer .= pfw_file_get_contents($TPLP['layout'].'footer.tpl.php', $footer_data);
	if(empty($section)) {
		$section = pfw_file_get_contents($section_file, $section_data);
	}

	switch($g_show) {
	// head, body 태그없이 출력
	case 'json':
		break;
	case 'embed':
		break;
	default:
		$layout_file = (isset($layout_file)) ? $layout_file : $TPLP['layout'].'layout.standard.tpl.php';
		include($layout_file);
		break;
	}

} // BLOCK

// End of file
