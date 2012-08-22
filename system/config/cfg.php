<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 일반설정
	 */

	date_default_timezone_set('Asia/Seoul');	// 기본시간대
	ini_set('display_errors', 'off');	// 에러메시지 출력안하게

	$CFG = array();
	$CFG['utc']			= '+09:00';	// UTC 시차
	$CFG['encode']		= 'utf-8';	// 기본 인코딩

	$CFG['lang']		= isset($g_lang) ? $g_lang : 'kor';  // 기본언어
	$CFG['show']		= isset($g_show) ? $g_show : 'html'; // 기본화면출력 : html, html_emb(embed형식), html_cont(head,body태그 빼고 내용만 출력), xml, docbook, json

	$CFG['email']		= '';	// 관리자 이메일
	$CFG['pass_key']	= 'a5Fk69%a';
	$CFG['skin']		= 'basic';	// 기본 스킨

	// 기본으로 불러올 모듈들 (array형태로 지정)
	$CFG['default_module'][] = 'auth';
	$CFG['default_module'][] = 'menu';
	$CFG['default_module'][] = 'layout';

	/**
	 * PATH설정
	 *
	 * 시스템상의 접근경로 설정
	 * 시스템 운영에 꼭 필요한 디렉토리는 /pathinfo.php에서 상수로 설정
	 * 그밖의 부수적인 디렉토리는 변수로 설정...
	 */
	$PATH = array();

	$PATH['log']	= TEMP_PATH.'log/';	// 로그 저장용 (시스템 사용에 관한 기록들)
	$PATH['sess']	= TEMP_PATH.'sess/';// 세션 저장용
	// #todo
	// log는 로그 처리하는 모듈의 변수에 sess는 회원관리 하는 모듈의 변수에 둬야 되지 않을까?

	/**
	 * URL설정
	 *
	 * 웹에서 접근할때의 주소
	 */
	// $URL변수 초기화
	$URL = array();
	// ROOT (상대주소를 사용할 경우에는 빈칸 또는 ./, 절대 주소를 사용할때는 웹상의URL을 적는다)
	$URL['root']  = './';
	// 기본페이지 (pfw의 모든 프로그램이 "기본페이지?변수1=값1&변수2=값2 와 같은 형태로 호출됨)
	$URL['main']  = $URL['root'].'index.php';

	/**
	 * 템플릿 설정
	 *
	 * 화면 출력에 필요한 변수들
	 * 시스템 내부에서 접근할 때의 주소
	 * $TPLP = PATH : 프로그램 내부 include할 때 사용하는 변수 (include($TPLP['layout'].'main.tpl.php');
	 * $TPLU = URL  : HTML에서 사용하는 변수 ( <img src="<?=$TPLU['layout'];?>example.png" />
	 * $TPLP['모듈명'] 같은 형태로 사용, 예를들어 $TPLP['auth'] : auth 모듈의 스킨 디렉토리
	 */
	$TPLP = array();
	$TPLU = array();

// end of file
