<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * DB를 쓰지 않는 페이지에서 include하는 init.tail(초기화)꼬리화일
	 */

	// 템플릿출력에는 불필요한 환경설정 변수 삭제
	unset($CFG);

// this is it
