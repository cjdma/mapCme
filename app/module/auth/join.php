<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 회원가입
 */

require(SYS_PATH.'init/init.common.head.php');
{ // Model : Head

	{ // BLOCK:init:2011052201:초기화

		include_once($PATH['auth']['config'].'lang.module.auth.'.$CFG['lang'].'.php');

	} // BLOCK
	// PROC CODE

} // Model : Tail
require(SYS_PATH.'inc/init.common.tail.php');

// ======================================================================

{ // View : Head

	$section_data['url']  = $URL;
	$section_data['lang'] = $LANG;
	$section = pfw_file_get_contents($TPL['auth'].'join.tpl.php', $section_data);

	$pub_option['form'] = TRUE;
	include_once(PROC_PATH.'pub.proc.php');

} // View : Tail
?>
