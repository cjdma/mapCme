<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * DB 환경설정
	 */
	$CFG_DB = array();
	$CFG_DB['type']   = 'mysql';
	$CFG_DB['host']   = 'localhost';
	$CFG_DB['name']   = 'dbname';
	$CFG_DB['user']   = 'dbuser';
	$CFG_DB['pass']   = 'dbpasswd';
	$CFG_DB['prefix'] = 'mc_';
	$CFG_DB['encode'] = 'utf8';

	$CFG_DB['page_set']  = 10; // 한 페이지에 출력하는 row수
	$CFG_DB['block_set'] = 10; // 한 페이지에 출력되는 block수

// this is it.
