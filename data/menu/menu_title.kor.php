<?php
	if(!defined('__MAPC__')) { exit(); }

	$MENU = isset($MENU) ? $MENU : array();

	$MENU['sitemap']['comm']['_title'] = '커뮤니티';
	$MENU['sitemap']['comm'][0]['_title'] = '공지사항';
	$MENU['sitemap']['comm'][1]['_title'] = '자유게시판';

	$MENU['sitemap']['user4out']['_title'] = '회원메뉴';
	$MENU['sitemap']['user4out'][0]['_title'] = '회원가입';
	$MENU['sitemap']['user4out'][1]['_title'] = '로그인';

	$MENU['sitemap']['user4in']['_title'] = '회원정보';
	$MENU['sitemap']['user4in'][0]['_title'] = '회원정보';
	$MENU['sitemap']['user4in'][1]['_title'] = '쪽지 보내기';
	$MENU['sitemap']['user4in'][2]['_title'] = '쪽지 확인';
	$MENU['sitemap']['user4in'][3]['_title'] = '쪽지 리스트';
	$MENU['sitemap']['user4in'][4]['_title'] = '보낸 쪽지';
	$MENU['sitemap']['user4in'][5]['_title'] = '받은 쪽지';

	$MENU['sitemap']['mapc']['_title'] = '위키';
	$MENU['sitemap']['mapc'][0]['_title'] = '위키 글보기';
	$MENU['sitemap']['mapc'][1]['_title'] = '위키 글쓰기/편집';
	$MENU['sitemap']['mapc'][2]['_title'] = '위키 리스트';

// this is it
