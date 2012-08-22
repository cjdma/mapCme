<?php
define('__MAPC__', true);

{

	// 기본디렉토리, 아래의 디렉토리 위치를 다른 곳으로 변경할 경우 이 값을 변경해줘야 함
	// 뒷부분은 언제나 /(슬래시)를 붙여야 합니다.
	define('ROOT_PATH', '../');

	require_once( ROOT_PATH . 'common.php' );

}

{ // BLOCK:page_load:2012080901:페이지 불러오기

	if($g_modl) {

		include_once( MODL_PATH . $g_modl. '/' . $g_page . '.php' );

	} else {

		include_once( PAGE_PATH . $g_page . '.php' );

	}

} // BLOCK

// end of file
