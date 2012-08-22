= MAPC.me
http://mapc.me/

지금 막 시작하는 거라 아무것도 없습니다. ^^
소스역시, 아직 공개용으로 돌릴수 없음에도(기본적인 작업도 안끝난)
계속 내일로 미루면 빛도 보지 못할것 같은 불안감에-_-;;
아직 엉망인 소스 그대로 내놓습니다.

2012-08-12 : 기본설계 끝내고 위키 글쓰기 부분부터 만들기 시작했습니다. ^^


== 프로그램 구동절차

1. app/index.php?core_modl=wiki&core_page=edit 같은 형태로 접근하려는 모듈과 페이지를 지정합니다.
(위키의 편집페이지에 접근할 때를 예로 들면)

2. index.php 에서는
	ROOT_PATH를 지정한 후 ROOT_PATH에 있는 common.php를 불러옵다.

2.1. common.php에서는 사이트 전체에 영향을 미치는 사용자 입력값(언어, 모듈, 페이지)을 파악하고
	각 디렉토리의 위치를 상수에 저장합니다.

2.2. 사용자가 호출한 모듈+페이지를 불러옵니다.


3. 사용자가 지정한대로 wiki모듈안의 edit페이지 즉, wiki/edit.php 에서는
(위키의 편집페이지에 접근할 때를 예로 들고 있는 중입니다.)
	우선, 프로그램 내부적인 일들을 처리하고
	그후, 출력에 필요한 일들을 처리합니다.
	즉, 선처리 후출력 방식인데,
	이렇게 하면 프로그램 내부에서 출력할 때 DB에 같이 접근하는 것 보다는 빨라진다고 합니다.


4. 페이지에서의 처리과정
(app/?core_page=dashboard 처럼 페이지만 호출하는 경우)

4.1. page/디렉토리에서 해당 페이지를 가져옵니다.
(편의상 dashboard를 호출하는 걸 예로 들자면)

4.2.
	dashboard 출력에 필요한 최신글 목록을 bbs/list.php 가져오고
	dashboard 로그인 창 auth/outlogin.php도 가져오고

4.3.
	최신글 스킨 include
	로그인창 스킨 include



== 특징

* 모듈과 페이지를 분리
** 이 프로그램을 사용하시는 분은 자신만의 페이지를 만들고 필요한 모듈이 있으면 (게시판, 달력 따위) 사용자가 만든 페이지에서 include만 하면 됩니다.
** 배포하는 프로그램에는 모듈만을 수정하기 때문에 업데이트를 받고나서도 사용자가 만든 페이지는 변경되지 않습니다.

* 실행에 꼭 필요한 스크립트만 불러오기 때문에 실행속도가 빠릅니다.

* DB를 사용하지 않는 프로그램을 위해 기본적인 코드는 PHP화일로 저장합니다.

* 클래스를 사용하지 않은 가장 PHP스러운 프레임웍입니다.

** 클래스를 사용하지 않는 이유...객체화의 특징이라고 꼽는 몇가지 중에서

*** 캡슐화 - 컴파일언어에서의 라이브러리 제작자를 위해 필요한 기능이지만, PHP처럼 소스 자체를 볼 수 있는 (그리고 볼 수 밖에 없는) 언어에서는 소용이 없습니다.

*** 다형성 - PHP에서는 구현이 되어있지 않습니다.

*** 메시지 전달

**** 객체 안에서 또다른 객체를 사용할 수 있다는 뜻인데...
**** PHP는 메모리에 상주하지 않기 때문에...
**** JSP같은 각각의 클래스가 서로 다른 프로세스에서 실행되지 않는 이상 필요없습니다.
**** (JSP는 서블릿형태로 컴파일 된 이후에 실행됨)

* 클래스는 불필요한 함수도 전부 불러와야 합니다.

** 클래스는 클래스안의 함수를 서로 다른 화일로 만들지 못하지만
** 함수를 사용할 경우 각각의 함수를 서로 다른 화일로 나누고 꼭 필요한 함수만 불러들일 수도 있습니다.
** 컴파일되지 않는 언어라면 이 방법이 더 빠를것입니다.





== 코딩규칙

* pear 코딩 표준을 따르는 것을 원칙으로 합니다.
** http://pear.php.net/manual/en/standards.php

* 단, 가독성, 효율성을 따졌을 때 더 나은 방법이 있다면 그 방법을 채택합니다.

* pear와는 다른 이 프로젝트만의 방법

	+ array 값앞에 쉼표를 붙이고 첫번째 값은 두칸 들여쓰기합니다.
	  (이렇게 하면 첫번째 값을 지울때만 신경쓰면 되고, 중간값을 지우든 마지막값을 지우든 한줄만 지우면 됩니다.)
		array = (
			  'a' => 'value1'
			, 'b' => 'value2'
			, 'c' => 'value3'
		);





== 디렉토리 구성

	/cache
		- 프로그램 실행할 때 자동으로 생성되는... 비교적 백업할 필요가 없는 파일들 (캐쉬, 로그, 세션 파일 같은)
	/data
		- 프로그램 실행할 때 자동으로 생성되는... 백업할 필요가 "있는" 파일들

	/system
		- 환경설정과 라이브러리들

		/config
			- 환경설정, 초기화 화일, 언어설정 등
			cfg.php
				- key값이 변하지 않는 환경설정들
			cfg.db.php
				- DB설정
			cfg.module.php
				- 설치된 모듈들에 대한 환경설정 include
			cfg.local.php (아직 만들지 않았음 추후에 key값이 유동적인 환경설정이 필요할 경우 만들 예정)
				- key값이 유동적인 환경설정들
				- 예를 들어 cfg.php안의 $CFG['url'], $CFG['now'], $CFG['nowts']에서의 url, now, nowts 는 변하지 않습니다.
				- 하지만, cfg.local.php의 $URL['welcome'], $URL['introduce']의 값들은 사이트의 성격에 따라 key 값이 추가되거나 삭제될 수 있습니다.
				- 쉽게말해 어떤 사이트는 $URL['welcome'], $URL['introduce']를 사용하지만 다른 사이트에서는 $URL['welcome'], $URL['company']와 같이 변경할 수도 있는 값들이라는 얘기지요.
			lang.{언어코드}.php
				- 언어설정 화일

		/init
			- 초기화, 마무리 파일들
			- 화면에 표시하기전 내부적으로 실행하는 프로그램들을 실행하기 전에 필요한 config파일들, library파일들을 불러오는 구문모음...

		/library
			- 함수모음
			common.func.php
				- 일반함수 모음
			db.func.php
				- DB처리 관련 함수
			file.func.php
				- 화일처리 관련 함수
			*.proc.php
				- 비슷한 형태의 문장이 여러개의 화일에 나올 경우 그 문장들을 묶어 proc.php화일로 만들어서 사용할 수 있습니다.
				- "함수"로 처리하기는 넘겨야 되는 변수(넘김값)들이 많고
				- 프로그램실행 할 때 딱 한 번만 사용할 경우 굳이 function으로 만들 필요가 없는 문장만 proc화일로 만듭니다.
				- 단, proc에 들어간 변수는 include시키는 상위 프로그램과 충돌을 일으킬 수 있기 때문에 사용할때는 주의해야 합니다.
				- 예를 들어,
					$a = 1; $b = 2;라고 저장해놓고
					show.proc.php에서
					$a = 2; $b = 3;이라고 해놓으면
					변수가 서로 꼬인다는.... (기초적인 얘기라 적을 필요는 없지만 ^^;;;)

		/language
			- 언어설정

		/proc
			- 자주 쓰는 일괄 프로그램 모음

	/web
		- 웹에서 접근하는 파일들, 아마도 웹마스터가 가장 많이 건드려야 할 부분

		/module
			/controller
				- MVC중 Controller에 해당 (controller를 직접 호출하는 경우도 있고 page파일에서 불러오는 경우도 있음)
				- 예를들어, bbs/list controller를 직접 가져와서 리스트를 뿌려주는 경우도 있고, "첫페이지"파일에서 최신글(bbs/list)를 불러오는 경우도 있음
			/model
				- MVC중 Model에 해당
				- model은 해당모듈의 controller에서만 불러오는것을 추천합니다. (날코딩도 당연히 동작합니다만...)
			/view
				- MVC중 View에 해당		
		/page
			- 개별페이지들
			- 모듈안에 page모듈을 넣고 DB접근 없이 페이지만 불러오는 페이지들을 따로 모아둘까 했었는데
			- page는 각각의 웹마다 커스터마이징을 많이 해야 될 것 같아서 따로 빼두었음...
		/plugin
			- 다른 개발자가 만든 프로그램들, jquery, wymeditor...
			    사실 모듈과 큰 차이가 없지만, 저작권이나 버전업 기타 다른 문제를 관리하기 쉽게하기 위해 plugin디렉토리를 따로 만듦





== 공통점 vs 차이점


	* cache vs data
	** 공통점 : 둘다 프로그램 실행중에 생성되는 파일

	** 차이점 :
		cache는 비교적 백업할 필요가 없는 파일들 (로그, 세션 등)
		data는 서버이전을 할 때 백업해야 되는 파일들


	* module/ vs library/
	** 공통점 : 여러번 호출될 가능성이 많은 프로그램들을 모아둠


	** 차이점 :
		module	- 화면 출력이 필요한 라이브러리, 가끔씩 단독호출도 할 수 있음 (일종의 library패키지)
			예) 게시판 모듈, 회원 모듈
		library	- 화면 출력이 필요없는 단편적인 프로그램
			전체 모듈에 범용적으로 쓰일 것들만 라이브러리에 넣는다.
			함수 단독으로... 범용적으로 쓰일 수 있는 함수들 모음
			예) 입력값 검사하는 라이브러리, DB연결하는 프로그램, file입출력 프로그램

	* /pathinfo.php의 ???_PATH 변수 vs cfg.custom.php 안의 $PATH변수
	** 공통점 : 디렉토리 위치를 지정

	** 차이점 :
		???_PATH - 시스템에서 기본적으로 사용하는... 추가되거나 삭제되지 않는 변수
			(단, SYS_PATH = system/ 디렉토리가 sys/처럼 이름이 바뀔 수는 있음)
		$CFG['???'] - 추가 되거나 삭제될 가능성이 있는 디렉토리들...
			예) $PATH['bbs']['skin']


	* 그밖에
		/data/ 디렉토리안에는 설치된 모듈명으로 된 디렉토리만 만드는 것을 추천(/data/bbs/, /data/user/ 와 같은 형식으로)




== 변수 정의

$g_ : 시스템 운영에 꼭 필요한 변수, index.php와 init.php화일에서만 설정하는 것을 권장
	(사용자의 입력값에 의해 변경되는 $g_ 변수는 index에서, 시스템에 의해 변경되는 $g_ 변수는 init에서 지정)
	$g_modl 접속하려는 모듈
	$g_link 접속하려는 페이지
	$g_lang 사용언어
	$g_show all:전체페이지(default), emb:embed형식(head제외), con:content형식(head포함)

	$g_dbh	DB핸들링 전역변수
	$g_user	사용자 정보

$URL
	- 웹에서 접근할 때의 주소
$TPLP
	- 템플릿 디렉토리에 시스템 내부에서 접근할때의 주소
$TPLU
	- 템플릿 디렉토리에 시스템 외부(웹)에서 접근할때의 주소
$LANG
	- 각 언어별 단어, 문장





== 화일명 정의

* init. 초기화 화일
: DB초기화, 필요한 환경설정 화일들을 불러오는 실행문 따위가 담겨있음

* func. 함수 또는 함수들의 모음
* class. 클래스
* proc. 자주쓰지만 형태가 크게 바뀌지 않는 구문들을 묶어놓은 화일
: 프로그래머의 선택에 따라 proc.화일을 include할 수도, 각각의 실행문을 바로 실행할 수도 있다.
{{{
	ex)
		선택1.
			include(head.tpl.php);
			include(body.tpl.php);
			include(tail.tpl.php);
		선택2.
			include(pub.proc.php);
			(pub.proc.php에는 [선택1]의 구문이 들어있다고 가정)
}}}





== 시소러스 (7자까지는 본래용어 그대로, 8자 이상은 코드로 만들어서 사용)

* 데이터베이스
: db(O), database(X)

* 상품(O), 제품(X)
: item(O), goods(X), merchandise(X)

* 샵(O), 샾(X), 가게(X), 스킨(X) (분양받은 샵을 지칭할 때)
: shop(O), mall(X)

* 제휴사
: agent(O)

* 판매
: sell

* 구입
: buy

* 사용자
: user(O), member(X)

* 로그인
: signin(O), login(X)

* 로그아웃
: signout(O), logout(X)

* 가입
: signup(0)

* 탈퇴
    : leave(O), secede(X)
* 차단
: block(O)

* 주소
: address(O)

* 게시판
: bbs(O), board(X)

* 리스트
: list(O)

* 보기
: view(O)

* 내용
: content(O), contents(X) <- 주의:'s'가 없음.

* 등록, 삽입
: insert(O), regist(X), set(X)

* 추출
: get(O)

* 편집(글)
: update(O), edit(X)

* 판올림 - 단순 편집이 아닌 기능 추가 등 [업데이트]개념
: update(O)

* 삭제
: delete(O)

* 만료
: expire(O)

* 업로드
: upload(O)





== 사이트를 처음 만들 때 ==

* 아래의 내용들은 나중에는 프로그램으로 자동으로 실행되게끔 만들겠지만 아직은 수동으로 해야 됩니다.
* 정식판이 나온 프로그램이 아니니 그러려니 하세요. ^^;;; (// #todo)
* 설치한 모듈에 정보를 가지고 cfg.module.php를 변경합니다.
* data/menu/안의 파일들을 만드시려는 사이트에 맞게 조정하세요. (물론, 메뉴가 필요없는 사이트는 건드리지 않으셔도 됩니다.)
* page/ 디렉토리에 html페이지들을 넣습니다. (사이트소개같은 사이트에 특화된 메뉴)






== 기타 ==

* 날짜표기 : ISO 8601 (2002-12-31T05:55+09:00와 같은 모양)
* 언어 : ISO 639-2 (세자리수 표기, kor, eng와 같은 모양)
* 국가 : ISO 3166-1 alpha-3
* form 태그 및 디자인에는 영향을 주지 않지만 프로그램 실행에 필요한 태그는 디자이너가 실수로 지울 수 있는 상황을 방지하기 위해 echo를 사용하여 출력하였습니다.
: PHP태그로 되어있으면 본능적(?)으로 지우면 안되겠구나~ 생각하겠죠? ^_^
{{{
	ex)
		<?php echo '<form method="post" action="'.$URL['proc'].'">'; ?>
}}}





== 해야할 일 ==

* 지금은 nav.tpl.php 에 $menu를 바로 출력하는데
	nav.tpl.php $nav값을 출력하고 nav.tpl.php 호출하기 직전에 $nav안에 필요한 변수들 넣기($menu, $사이드바 따위)
















// ==================================================
// 아이디어노트
// ==================================================

== 저장하는 형태
	목록(URL 등...) (마우스 드래그로 메뉴 정렬 가능하도록)
	docbook 일반 글
	SVG
	wireframe(메뉴 목록 + 이미지형태를 동시에 편집할 수 있는 형태로 wireframe 제작할 수 있지 않을까?)


== 내 책

* 책 생성(일종의 게시판 생성)

== 글쓰기

* 기존의 글을 불러올지, 아니면 새로운 글을 쓸지 결정
** 기존의 글을 불러올 경우 새로운 글로 저장할 것인지
	- 기존글이 바뀌어도 이곳의 글은 그대로 남길지 아니면 동기화 시킬지도 결정
** 글리스트와 글내용을 서로 다른 DB에 저장

* 제목들을 추출해서 index생성 (==, === 태그들을 가져와서 index생성)


== 스크랩

* 스크랩에서 '내 책'목록에 넣을 수 있게~
* 스크랩할 경우 원본그대로 내용링크만 할 것인지, 내용을 가져와서 내 DB에 담을 것인지 결정
* '책' 목록에서 글을 선택할 때 호스트:DB:테이블 에서 필요한 자료들 불러오게 하도록...
* 글에 연결된 글이 있으면 (같이보기같은...) 같이 긁어갈지 여부도 결정
  (같이 긁어가지 않을 경우 링크형태로 제공)
  예-같이보기 : [b92kj58g9dk2:실행 및 활용하기] 같은 글이 있을 때 [http://원래URL.com/b92kj58g9dk2:실행 및 활용하기] 로 변경할지 아니면 퍼간 후에 [바뀐qid:제목] <- 이렇게 바꿀지 정하는 옵션

--------------------------------------------------------------------------------

--------------------------------------------------------------------------------

1. 필요기능
	0. 메뉴(index자료를 활용)
	1. 리스트
	2. 글보기
	3. 글쓰기
		1. 덧붙임1
			Creole(http://www.wikicreole.org/wiki/Creole1.0)로 작성한 글을 저장하면 Docbook, Dublincore 형식도 같이 저장되야 함
			예)
				data/arc/12kw5kh319a6lf90.xml (Docbook + DublinCore)
				data/arc/12kw5kh319a6lf90.txt (Creole)
		2. 덧붙임2
			Dublincore에 필요한 내용은 추가로 입력받음
		3. 덧붙임3
			HTML(WYMEDITOR)형태로 입력받은 경우 Creole와 Docbook 형태로 자동변환
		4. 덧붙임4
			외부에서 스크랩하려고 할때의 옵션지정
	4. 검색
	5. 외부자료 스크랩
		1. 덧붙임:스크랩해올 경우 옵션
			1.  원글이 삭제 될 경우 퍼온 글에
				[삭제되었음]표시만 할것인지, 같이 삭제할 것인지 아니면 아무 변화없이 할 것인지...

	* 글이 내용은 Docbook 형태, 색인은 Dublin core로 저장되고
	  반출도 Docbook+Dublin core형태로 가능한
	  글 목록은 단순한 리스트가 아닌 마인드 맵형태로 출력하는 위키

index화일구성 (index화일은 dublincore로 작성하는게 좋을듯.. 그냥txt화일로 만들까?)

index.xml
<section>
	<title>
		책이름
	</title>
	<para>
		* 요약:
		* 화일위치:책내용화일(또는 책index화일, 또는 URL)
	</para>
</section>

책목록
* 책이름1:책이름1.xml
* 책이름2:책이름2.xml
* 책이름3:책이름3.xml

책이름1(글목록)
* 챕터1:디렉토리/SUB디렉토리/화일1.xml:연결정보(다른곳에서 퍼온것인지 이곳에만 쓴것인지,다른게시판과의 공조에 대한 세밀한 설정이 필요)
* 챕터2:디렉토리/SUB디렉토리/화일2.xml
** 챕터2-1:디렉토리/SUB디렉토리/화일2-1.xml
** 챕터2-2:디렉토리/SUB디렉토리/화일2-2.xml

책이름2
* 챕터1:디렉토리/SUB디렉토리/화일1.xml
* 챕터2:디렉토리/SUB디렉토리/화일2.xml

중복되는 화일(글)을 다른 게시판에 올릴 수 있음



dublin core 자동생성
http://www.webarchiv.cz/generator/dc_generator.php?lang=en

<?xml version="1.0"?>
<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
            xmlns:dc="http://purl.org/dc/elements/1.1/">  
  <rdf:Description rdf:about="abc.xml">
    <dc:creator>a</dc:creator>
    <dc:contributor>b</dc:contributor>
    <dc:publisher>c</dc:publisher>
    <dc:subject>d</dc:subject>
    <dc:description>e</dc:description>
    <dc:identifier>f</dc:identifier>
    <dc:relation>g</dc:relation>
    <dc:source>h</dc:source>
    <dc:rights>i</dc:rights>
    <dc:format>j</dc:format>
    <dc:type>k</dc:type>
    <dc:title>l</dc:title>
    <dc:date>m</dc:date>
    <dc:coverage>n</dc:coverage>
    <dc:language>o</dc:language>
  </rdf:Description>
</rdf:RDF>


<?xml version="1.0" encoding="UTF-8"?>
<book xml:id="simple_book" xmlns="http://docbook.org/ns/docbook" version="5.0">
	<title>Very simple book</title>

	<chapter xml:id="chapter_1">
		<title>Chapter 1</title>
		<para>Hello world!</para>
		<para>I hope that your day is proceeding <emphasis>splendidly</emphasis>!</para>
	</chapter>
	<chapter xml:id="chapter_2">
		<title>Chapter 2</title>
		<para>Hello again, world!</para>
	</chapter>
</book>



<?xml version="1.0"?>
<article
	xmlns="http://docbook.org/ns/docbook" version="5.0" xml:lang="en"
	xmlns:dc="http://purl.org/dc/elements/1.1/" >

<link xlink:href="#preview">previewing</d:link>

<mediaobject>
  <alt>mouse buttons</alt>
  <imageobject>
    <imagedata fileref="mouse.png" />
  </imageobject>
</mediaobject>

<itemizedlist mark='opencircle'> // orderedlist
	<listitem>
    	<para>
    		TeX and LaTeX
    	</para>
	</listitem>

	<listitem>
		<para>
			Lout
		</para>
	</listitem>

	<listitem override='bullet'>
    	<para>
    		Troff
    	</para>
	</listitem>
</itemizedlist>

<simplelist type='horiz' columns='3'>
<member>A</member>
<member>B</member>
<member>C</member>
<member>D</member>
<member>E</member>
<member>F</member>
<member>G</member>
</simplelist>

</article>
----------------------------------
사용자, 권한, Role

Article

Theme