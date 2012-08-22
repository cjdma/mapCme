<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 글쓰기
	 */

	require(SYS_PATH.'init/common.head.init.php');
	{ // Model : Head

		{ // BLOCK|설명|버전  ++++++++++++++++++++++++++++++++++++++++++++++++++

			include($MODULE_MAPC_PATH['model'].'get_dc.func.php');
			$section_data['dc'] = mapc_get_dc($_GET['mapc_uid']);

		} // BLOCK

	} // Model : Tail
	require(SYS_PATH.'init/common.tail.init.php');

	// ======================================================================

	{ // View : Head

		$section = pfw_file_get_contents($TPLP['mapc'].'view.tpl.php', $section_data);
		include_once(SYS_PATH.'proc/pub.proc.php');

	} // View : Tail

// end of file
