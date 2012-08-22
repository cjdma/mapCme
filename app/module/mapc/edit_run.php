<?php
if(!defined('__MAPC__')) { exit(); }

/**
 * 편집
 */

require(INIT_PATH.'common.head.init.php');
{ // Model : Head

	{ // BLOCK:set_varuable:2012082201:입력값 체크 & 초기값 설정

		$save_dir	= $g_user['userid'] ? $g_user['userid'].'/' : '_default/';
		$save_dir	= $MODULE_MAPC_PATH['data'] . $save_dir;

	} // BLOCK

	{ // BLOCK|dc_insert|2012080901|더블린 코어 DB에 입력, 또는 수정

		$dc['identifier']  = (empty($_POST['dc_identifier']))  ? uniqid('mcm') : $_POST['dc_identifier'];
		$dc['title']       = (empty($_POST['dc_title']))       ? '' : $_POST['dc_title'];
		$dc['subject']     = (empty($_POST['dc_subject']))     ? '' : $_POST['dc_subject'];
		$dc['description'] = (empty($_POST['dc_description'])) ? '' : $_POST['dc_description'];
		$dc['contributor'] = (empty($_POST['dc_contributor'])) ? '' : $_POST['dc_contributor'];
		$dc['language']    = (empty($_POST['dc_language']))    ? '' : $_POST['dc_language'];
		$dc['format']      = (empty($_POST['dc_format']))      ? '' : $_POST['dc_format'];
		$dc['type']        = (empty($_POST['dc_type']))        ? '' : $_POST['dc_type'];
		$dc['date']        = (empty($_POST['dc_date']))        ? '' : $_POST['dc_date'];
		$dc['creator']     = (empty($_POST['dc_creator']))     ? '' : $_POST['dc_creator'];
		$dc['publisher']   = (empty($_POST['dc_publisher']))   ? '' : $_POST['dc_publisher'];
		$dc['relation']    = (empty($_POST['dc_relation']))    ? '' : $_POST['dc_relation'];
		$dc['source']      = (empty($_POST['dc_source']))      ? '' : $_POST['dc_source'];
		$dc['rights']      = (empty($_POST['dc_rights']))      ? '' : $_POST['dc_rights'];
		$dc['coverage']    = (empty($_POST['dc_coverage']))    ? '' : $_POST['dc_coverage'];
		$rdf['about']      = (empty($_POST['rdf_about']))      ? '' : $_POST['rdf_about'];
		$mapc_contents     = (empty($_POST['mapc_contents']))  ? '' : $_POST['mapc_contents'];

		// hmmmmmmmmmnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnllllllllllllllllllllllllllllllllllllll

		$query = "
			REPLACE INTO mapc_article
			   SET dc_identifier  = '".$dc['identifier']."'
				 , dc_title       = '".$dc['title']."'
				 , dc_subject     = '".$dc['subject']."'
				 , dc_description = '".$dc['description']."'
				 , dc_contributor = '".$dc['contributor']."'
				 , dc_language    = '".$dc['language']."'
				 , dc_format      = '".$dc['format']."'
				 , dc_type        = '".$dc['type']."'
				 , dc_date        = '".$dc['date']."'
				 , dc_creator     = '".$dc['creator']."'
				 , dc_publisher   = '".$dc['publisher']."'
				 , dc_relation    = '".$dc['relation']."'
				 , dc_source      = '".$dc['source']."'
				 , dc_rights      = '".$dc['rights']."'
				 , dc_coverage    = '".$dc['coverage']."'
				 , rdf_about      = '".$rdf['about']."'
			";

		$g_dbh->exec($query);

		if($is_succ) {
			$msg = $LANG['suc_submit'];
		} else {
			$msg = $LANG['err_submit'];
		}

	} // BLOCK

	{ // BLOCK:dc_file_make:2012080901:더블린코어 파일 생성

		// #todo 사용자별로 data디렉토리 지정
		// 지금은 임시로 default안에 저장되도록 했지만, data/mapc/사용자ID/ 안에 저장되도록 해야 됨
		$fp = fopen($MODULE_MAPC_PATH['data_user'] . $dc['identifier'].'.rdf', 'w');

		$doc = new DOMDocument('1.0', 'utf-8');
		$doc->formatOutput = true;

		$root = $doc->createElement('rdf:RDF');
		$doc->appendChild($root);

		$root_attr = $doc->createAttribute('xmlns:rdf');
		$root_attr->value = 'http://www.w3.org/1999/02/22-rdf-syntax-ns#';
		$root->appendChild($root_attr);
		$root_attr = $doc->createAttribute('xmlns:dc');
		$root_attr->value = 'http://purl.org/dc/elements/1.1/';
		$root->appendChild($root_attr);

		$desc = $doc->createElement('rdf:Description');
		$root->appendChild($desc);

		$desc_attr = $doc->createAttribute('rdf:about');
		$desc_attr->value = $rdf['about'];
		$desc->appendChild($desc_attr);

		$identifier = $doc->createElement('dc:identifier', $dc['identifier']);
		$identifier = $desc->appendChild($identifier);

		$title = $doc->createElement('dc:title', $dc['title']);
		$title = $desc->appendChild($title);

		$subject = $doc->createElement('dc:subject', $dc['subject']);
		$subject = $desc->appendChild($subject);

		$description = $doc->createElement('dc:description', $dc['description']);
		$description = $desc->appendChild($description);

		$contributor = $doc->createElement('dc:contributor', $dc['contributor']);
		$contributor = $desc->appendChild($contributor);

		$language = $doc->createElement('dc:language', $dc['language']);
		$language = $desc->appendChild($language);

		$format = $doc->createElement('dc:format', $dc['format']);
		$format = $desc->appendChild($format);

		$type = $doc->createElement('dc:type', $dc['type']);
		$type = $desc->appendChild($type);

		$date = $doc->createElement('dc:date', $dc['date']);
		$date = $desc->appendChild($date);

		$creator = $doc->createElement('dc:creator', $dc['creator']);
		$creator = $desc->appendChild($creator);

		$publisher = $doc->createElement('dc:publisher', $dc['publisher']);
		$publisher= $desc->appendChild($publisher);

		$relation = $doc->createElement('dc:relation', $dc['relation']);
		$relation = $desc->appendChild($relation);

		$source = $doc->createElement('dc:source', $dc['source']);
		$source = $desc->appendChild($source);

		$rights = $doc->createElement('dc:rights', $dc['rights']);
		$rights = $desc->appendChild($rights);

		$coverage = $doc->createElement('dc:coverage', $dc['coverage']);
		$coverage = $desc->appendChild($coverage);

		$creator = $doc->createElement('dc:creator', $dc['creator']);
		$creator = $desc->appendChild($creator);

		$contents = $doc->saveXML();

		fwrite($fp, $contents);
		fclose($fp);

	} // BLOCK

	{ // BLOCK:contents_insert:20120815:내용 집어넣기...

		// #todo mapc_contents의 형태를 변경
		// #todo markdown형태인지, creole인지, docbook인지, html인지... 확인한 다음 docbook형태로
		// 원본은 확장자만 바꿔서 저장... docbook형태로 또한번 저장
		// data디렉토리에는 컨텐츠코드.dc(더블린코어), 컨텐츠코드.dbk(닥북), 컨텐츠코드.확장자(텍스트이외의 파일업로드일 경우)
		// #todo
		// 컨텐츠UID.언어코드.1.dc
		// 컨텐츠UID.언어코드.1.file (여러개 업로드했을 때에는 순차적으로 증가 2.3.4.5....)
		// 원래 하나의 파일에 하나의 dc를 적용시킬까 했었는데 똑같은 내용의 여러개 파일들을 올리는 경우가 많아서... ^^
		

		// #todo 사용자별로 data디렉토리 지정
		// 지금은 임시로 default안에 저장되도록 했지만, data/mapc/사용자ID/ 안에 저장되도록 해야 됨
		$fp = fopen($MODULE_MAPC_PATH['data_user'] . $dc['identifier'].'.dbk', 'w');

		$doc = new DOMDocument('1.0', 'utf-8');
		$doc->formatOutput = true;

		$root = $doc->createElement('article');
		$doc->appendChild($root);

		$root_attr = $doc->createAttribute('version');
		$root_attr->value = '5.0';
		$root->appendChild($root_attr);
		$root_attr = $doc->createAttribute('xmlns');
		$root_attr->value = 'http://docbook.org/ns/docbook';
		$root->appendChild($root_attr);
		$root_attr = $doc->createAttribute('xmlns:xlink');
		$root_attr->value = 'http://www.w3.org/1999/xlink';
		$root->appendChild($root_attr);
		$root_attr = $doc->createAttribute('xmlns:xi');
		$root_attr->value = 'http://www.w3.org/2001/XInclude';
		$root->appendChild($root_attr);
		$root_attr = $doc->createAttribute('xmlns:svg');
		$root_attr->value = 'http://www.w3.org/2000/svg';
		$root->appendChild($root_attr);
		$root_attr = $doc->createAttribute('xmlns:m');
		$root_attr->value = 'http://www.w3.org/1998/Math/MathML';
		$root->appendChild($root_attr);
		$root_attr = $doc->createAttribute('xmlns:db');
		$root_attr->value = 'http://docbook.org/ns/docbook';
		$root->appendChild($root_attr);

		$info = $doc->createElement('info');
		$root->appendChild($info);

			$title = $doc->createElement('title', $dc['title']);
			$title = $info->appendChild($title);

		// #todo
		// 기존의 Head태그보다
		// 같은 값이면 section 닫고 section 다시 열기
		// 하위 값이면 section 그대로 두고 section 열기
		// 높은 값이면 값의 차이만큼 section 닫기 <h3>3번제목</h3><p>내용</p><h1>1번제목</h1>
		// <- 여기서처럼 h1이 나올때 </section>(h3) </section>(h2) </section>(기존 h1) <section>(h1 시작)
		$sect = $doc->createElement('sect');
		$root->appendChild($sect);

		$contents = $doc->saveXML();

		fwrite($fp, $contents);
		fclose($fp);

/*
  <info>
    <title>섹션 이름</title>

    <author>
      <personname><firstname>이름</firstname><surname>성</surname></personname>

      <affiliation>
        <orgname>발행기관</orgname>
      </affiliation>
    </author>

    <pubdate>2012-09-01</pubdate>
  </info>

  <section>
    <title>섹션 타이틀</title>

    <para>내용들어가는 곳</para>
  </section>
</article>
*/

	} // BLOCK

} // Model : Tail
require(INIT_PATH.'common.tail.init.php');

// ======================================================================

{ // View : Head

	include_once(LIB_PATH.'js.message.func.php');

	$head = jsMessage($msg, 'refresh');

	include($TPLP['core'].'layout_content.tpl.php');

} // View : Tail

// end of file
