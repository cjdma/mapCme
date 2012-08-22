<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 로그인 처리
	 */
	function pfw_auth_signin(&$userid, &$userpasswd) {

		global $CFG_AUTH;

		if(empty($userid) || empty($userpasswd)) {

			$return['result'] = FALSE;

		}

		$query = '
			SELECT u_uid, u_id, u_nick, u_level, u_grp
			  FROM auth_user
			 WHERE u_id = "'.$userid.'"
			   AND u_password = "'.$userpasswd.'"
			';

		$resoc = mysql_query($query);
		$reslt = mysql_fetch_assoc($resoc);

		if($reslt != FALSE) {

			$_SESSION['user_id']    = $reslt['u_id'];
			$_SESSION['user_nick']  = $reslt['u_nick'];
			$_SESSION['user_level'] = $reslt['u_level'];
			$_SESSION['group']      = $reslt['u_grp'];
			$_SESSION['stat']       = 'signin';

			$return['result'] = TRUE;

		} else {

			$_SESSION['user_id']    = $CFG_AUTH['user_id'];
			$_SESSION['user_nick']  = $CFG_AUTH['user_nick'];
			$_SESSION['user_level'] = $CFG_AUTH['user_level'];
			$_SESSION['group']      = $CFG_AUTH['group'];
			$_SESSION['stat']       = 'signout';

			$return['result'] = FALSE;

		}

		return $return;

	}
?>
