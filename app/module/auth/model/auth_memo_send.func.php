<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 쪽지 보내기
	 * @param str $param['send_grp']	// 보내는 사람이 속한 그룹
	 * @param str $param['send_nick']	// 보내는 사람 닉네임
	 * @param str $param['send_id']		// 보내는 사람 아이디
	 * @param str $param['recv_id']		// 받는 사람 아이디
	 * @param str $param['memo']		// 쪽지내용
	 * @param str $param['memo_cate']	// 단순쪽지인지 알람이 필요한 쪽지 인지... 등등 <- 여기에 입력된 값에 따라 알림음 조절~
	 */

	/**
	 * 간단한 로직설명
	 *
	 * abc라는 아이디를 쓰는 사람이 zxc라는 사람에게 쪽지를 보내면
	 * memo_data_file에
	 * $memo_data['abc'] = 'zxc||보낸사람닉네임||짤막한내용'; 이런 형태로 기록을 남긴다.
	 * 쪽지가 왔는지 체크할 때는 (예를 들어, abc라는 사람의 쪽지를 체크할때는)
	 * memo_data_file을 읽어들이고 $memo_data의 키값중에 abc가 있는지 체크하면 된다.
	 * if(array_key_exists($memo_recv_id, $memo_data)) { // 쪽지왔음;
	 * } else { // 쪽지 없음;
	 * }
	 */

	function pfw_auth_memo_send($param) {

		global $CFG_AUTH;

		extract($param);

		{ // BLOCK:send_memo:2011050301:실제 메모 내용은 DB에 기록

			$query = "
				INSERT INTO auth_memo
					SET
						  me_grp    = '".$group."'
						, me_recvid = '".$recv_id."'
						, me_sendid = '".$send_id."'
						, me_sendtime = '".date('Y-m-d H:i:s')."'
						, me_memo	= '".$memo."'
				";
	
			if(db_query($query)) {
				$is_success = TRUE;
			} else {
				$is_success = FALSE;
			}

		} // BLOCK

		{ // BLOCK:send_log:2011050301:메모 보낸 신호를 남김

			// $memo_data 변수가 들어있는 memo_data화일을 include한다.
			if(is_file($CFG_AUTH['memo_data_file'])) {
				include($CFG_AUTH['memo_data_file']);
			}

			// memo_data화일에 메모받는 아이디 추가
			$memo_data[$recv_id] = $param['send_id'].'||'.$param['send_nick'];
	
			$fp = fopen($CFG_AUTH['memo_data_file'], 'w');
	
			// 기존 $memo_data의 자료들도 다시 기록
			fwrite($fp, "<?php\n");
			foreach($memo_data as $key => $var) {
				fwrite($fp, '$memo_data[\''.$key.'\'] = \''.$var."';\n");
			}
			fwrite($fp, "// this is it\n");
			fclose($fp);

		} // BLOCK

		return $is_success;
	}

// this is it
