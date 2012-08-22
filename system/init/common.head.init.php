<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 일반적인 페이지에서 include하는 init.head(초기화)머리화일
 */

// 환경설정
require_once(CONF_PATH.'cfg.php');
require_once(CONF_PATH.'cfg.db.php');
require_once(CONF_PATH.'cfg.module.php');

// 언어화일 include(cfg.php 에서 설정한 언어의 파일 불러오기)
require_once(LANG_PATH.$CFG['lang'].'.php');

// 기본함수 호출
require_once(LIB_PATH.'common.func.php');
require_once(LIB_PATH.'db.func.php');
require_once(LIB_PATH.'file.func.php');

// DB 연결
$g_dbh = pfw_db_connect($CFG_DB);

// 사용자정보
// #todo 사용자정보 가져오기
$g_user= array();

// this is it
