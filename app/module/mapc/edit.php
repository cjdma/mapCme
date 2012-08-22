<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 글쓰기
 */

require(INIT_PATH.'common.head.init.php');
{ // Model : Head

	{ // BLOCK:arg_check:2012081701:넘어온 값 점검

		// 글의 고유값
		$mapc_uid = $_GET['mapc_uid'];
		// 카테고리
		$mapc_cate= $_GET['mapc_cate'];

	} // BLOCK

	{ // BLOCK:tpl_load_by_cate:2012081701:카테고리값에 따라 템플릿 부르기(입력하는 내용에 따라 화면출력을 다르게 하려고)

		// #todo
		// 이미지, 동영상, 일반텍스트, 논문, 메모, 일기, 영화감상, 유머 여부에 따라서
		// 내용만 입력받을지, 주제에는 무슨무슨 내용을 자동으로 넣을지 결정...

	} // BLOCK

	{ // BLOCK

		include($MODULE_MAPC_PATH['model'].'dc_get.func.php');

		// #todo /data/mapc/사용자 디렉토리에서 가져오게끔... 없으면 default
		$section_data['dc'] = mapc_dc_get($_GET['mapc_uid'], $MODULE_MAPC_PATH['data_user']);
		$section_data['dc_edit_run_url']	= $MODULE_MAPC_URL['edit_run'];

	} // BLOCK

} // Model : Tail
require(INIT_PATH.'common.tail.init.php');

// ======================================================================

{ // View : Head

	$section = pfw_file_get_contents($TPLP['mapc'].'edit.tpl.php', $section_data);
	include_once(PROC_PATH.'pub.proc.php');

} // View : Tail

// end of file
