<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 글쓰기
	 */

	require(SYS_PATH.'init/common.head.init.php');
	{ // Model : Head

		{ // BLOCK|설명|버전  ++++++++++++++++++++++++++++++++++++++++++++++++++

			$query = "
				SELECT *
				  FROM mapc_index
				";

			$stmt = $g_dbh->prepare($query);
			$stmt->execute();

			for($i=0; $row=$stmt->fetch(); $i++) {
				$dc_list[] = $row;
			}
			$section_data['dc_list'] = $dc_list;

		} // BLOCK

	} // Model : Tail
	require(SYS_PATH.'init/common.tail.init.php');

	// ======================================================================

	{ // View : Head

		$section = pfw_file_get_contents($TPLP['mapc'].'list.tpl.php', $section_data);

		include_once(SYS_PATH.'proc/pub.proc.php');

	} // View : Tail

// end of file
