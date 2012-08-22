		<title><?php echo $title; ?></title>
		<link href="<?php echo $css_url; ?>style.css" rel="stylesheet" type="text/css" media="screen" />

		<?php
			if(is_array($css)) {

				foreach($css as $css_file => $var) {

					echo '<link href="', $css_url, $css_file, '" rel="stylesheet" type="text/css" media="screen" />';

				}

			}

			if(is_array($js)) {

				foreach($js as $js_file => $var) {

					echo '<script type="text/javascript" src="', $js_url, $js_file, '"></script>';

				}

			}
		?>
