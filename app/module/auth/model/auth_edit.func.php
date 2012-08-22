<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 회원가입 처리
	 */

	function pfw_auth_edit(&$param = array()) {

		$prefix = isset($param['prefix']) ? $param['prefix'] : '';

		$query = '
			INSERT INTO '.$prefix.'auth_user
					SET u_uid    = "'.$u_uid.'"
					  , u_nick   = "'.$param['user_nick'].'"
					  , u_id     = "'.$param['user_id'].'"
					  , u_passwd = "'.$param['user_passwd'].'"
					  , u_email  = "'.$param['user_email'].'"
			';

		db_query($query);

	}

// this is it
