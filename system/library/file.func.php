<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 화일 내용 메모리에 넣기
	 *
	 * @param str $filename 가져오려는 화일
	 * @param str $data     출력하려는 내용
	 * @param str $display  출력할지(display), 버퍼에 넣을지(burfer)
	 *
	 * 사용예 :
	 *     $filename    = '/skin/list.tpl.php';
	 *     $data['url'] = 'index.php?id=298';
	 *     $contents    = pfw_file_get_contents($filename, $data, 'buffer');
	 */
	function pfw_file_get_contents($filename, &$data = array(), $display = '')
	{

		extract($data);

		@ob_start();

		include($filename);
		$buffer = @ob_get_contents();
		@ob_end_clean();

		return $buffer;

	}

// this is it
