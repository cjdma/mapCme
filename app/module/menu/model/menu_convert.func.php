<?php
	if(!defined('__MAPC__')) { exit(); }

	/**
	 * 메뉴변환
	 *
	 * array를 li로 변환
	 */
	function pfw_menu_convert($param = array(), $option = array()) {

		$return = '<ul class="'.$option['menu_class'].'">'.pfw_menu_convert_sub($param).'</ul>';

		return $return;

	}

	function pfw_menu_convert_sub($param = array()) {

		$recursion = __FUNCTION__;

		if( ! is_array($param)) {
			return '';
		}

		// _title이 지정되어있지 않은 array가 들어왔을 경우 하위 배열만 검사
		if(empty($param['_title'])) {
			foreach($param as $key => $var) {
				$return .= $recursion($var);
			}
		// _title, _link이외의 값들(서브메뉴)가 있을 경우
		} elseif(count($param) > 2) {
			$return  = '<li><a href="'.$param['_link'].'">'.$param['_title'].'</a>'."\n";
			$return .= '<ul>'."\n";
			foreach($param as $key => $var) {
				$return .= $recursion($var);
			}
			$return .= '</ul>'."\n";
			$return .= '</li>'."\n";
		} else {
			$return = '<li><a href="'.$param['_link'].'">'.$param['_title'].'</a></li>'."\n";
		}

		return $return;

	}
?>
