<?php
if(!defined('__MAPC__')) { exit(); }

require_once(INIT_PATH.'common.head.init.php');
{ // Model : Head

} // Model : Tail
require_once(INIT_PATH.'common.tail.init.php');

// ======================================================================

{ // View : Head

	$section_file = PAGE_PATH.'dashboard.tpl.php';

	include_once(PROC_PATH.'pub.proc.php');

} // View : Tail

// this is it
