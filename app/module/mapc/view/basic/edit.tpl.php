<script type="text/javascript" src="<?= APP_PATH; ?>plugin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= APP_PATH; ?>plugin/wymeditor/jquery.wymeditor.min.js"></script>



<form method="post" action="<?= $dc_edit_run_url; ?>">

<dl>
	<dt>
		제목
	</dt>
	<dd>
		<input type="text" name="dc_title" value="<?= $dc['dc_title']; ?>" />
	</dd>
	<dt>
		원문
	</dt>
	<dd>
		<textarea class="wymeditor" name="mapc_contents"></textarea>
	</dd>

	<dd>
		<input type="submit" class="wymupdate" value="확인" />
	</dd>

	<dt>
		주제
	</dt>
	<dd>
		<input type="text" name="dc_subject" value="<?= $dc['dc_subject']; ?>" />
	</dd>
	<dt>
		요약설명(요약설명이 없을 경우, 원문의 앞부분이 들어갑니다.)
	</dt>
	<dd>
		<input type="text" name="dc_description" value="<?= $dc['dc_description']; ?>" />
	</dd>
	<dt>
		형식(자원의 구현 방식)
	</dt>
	<dd>
		<input type="text" name="dc_format" value="<?= $dc['dc_format']; ?>" />
	</dd>
	<dt>
		자원의 위치(원문이 없을 경우 필요)
	</dt>
	<dd>
		<input type="text" name="rdf_about" value="<?= $dc['rdf_about']; ?>" />
	</dd>

	<dd>
		<input type="submit" class="wymupdate" value="확인" />
	</dd>


	<dt>
		기고자(#todo 지은이와 동일인일 경우 체크)
	</dt>
	<dd>
		<input type="text" name="dc_contributor" value="<?= $dc['dc_contributor']; ?>" />
	</dd>
	<dt>
		언어
	</dt>
	<dd>
		<input type="text" name="dc_language" value="<?= $dc['dc_language']; ?>" />
	</dd>
	<dt>
		유형(내용물의 성격, 장르)
	</dt>
	<dd>
		<input type="text" name="dc_type" value="<?= $dc['dc_type']; ?>" />
	</dd>
	<dt>
		날짜(ISO 8601)
	</dt>
	<dd>
		<input type="text" name="dc_date" value="<?= $dc['dc_date']; ?>" />
	</dd>

	<dt>
		지은이
	</dt>
	<dd>
		<input type="text" name="dc_creator" value="<?= $dc['dc_creator']; ?>" />
	</dd>
	<dt>
		발행처
	</dt>
	<dd>
		<input type="text" name="dc_publisher" value="<?= $dc['dc_publisher']; ?>" />
	</dd>
	<dt>
		식별자
	</dt>
	<dd>
		<input type="text" name="dc_identifier" value="<?= $dc['dc_identifier']; ?>" />
	</dd>
	<dt>
		타 자원과의 관계
	</dt>
	<dd>
		<input type="text" name="dc_relation" value="<?= $dc['dc_relation']; ?>" />
	</dd>
	<dt>
		출처
	</dt>
	<dd>
		<input type="text" name="dc_source" value="<?= $dc['dc_source']; ?>" />
	</dd>
	<dt>
		권한
	</dt>
	<dd>
		<input type="text" name="dc_rights" value="<?= $dc['dc_rights']; ?>" />
	</dd>
	<dt>
		범위
	</dt>
	<dd>
		<input type="text" name="dc_coverage" value="<?= $dc['dc_coverage']; ?>" />
	</dd>

	<dd>
		<input type="submit" class="wymupdate" value="확인" />
	</dd>
</dl>

</form>



<script type="text/javascript">
jQuery(function() {

    jQuery('.wymeditor').wymeditor();

});
</script>














<?php
if(false) {
?>
<style type="text/css">
    /* visual feedback */
    .about         { background-color: #f99; }
    .dc_creator    { background-color: #9f9; }
    .dc_subject    { background-color: #999; }
    .dc_title      { background-color: #9ff; }
    .foaf_Person   { background-color: #69c; }
    .foaf_name     { background-color: #99c; }
    .foaf_homepage { background-color: #c9c; }
    .foaf_mbox     { background-color: #c6c; }
    .foaf_phone    { background-color: #c3c; }
</style>

<script type="text/javascript">

/*EXTEND THE XHTML PARSER*/
/*************************/

//Add the RDFa attributes
WYMeditor.XhtmlValidator._attributes['core']['attributes'].push(
    'rel',
    'rev',
    'content',
    'href',
    'src',
    'about',
    'property',
    'resource',
    'datatype',
    'typeof');

//Add the 'standard' vocabularies
WYMeditor.XhtmlValidator._attributes['core']['attributes'].push(
    'xmlns:biblio',
    'xmlns:cc',
    'xmlns:dbp',
    'xmlns:dbr',
    'xmlns:dc',
    'xmlns:ex',
    'xmlns:foaf',
    'xmlns:rdf',
    'xmlns:rdfs',
    'xmlns:taxo',
    'xmlns:xhv',
    'xmlns:xsd');

//Overwrite the <a> attributes 'rel' and 'rev'
WYMeditor.XhtmlValidator._tags['a'] = {
    "attributes": {
        "0":"charset",
        "1":"coords",
        "2":"href",
        "3":"hreflang",
        "4":"name",
        "5":"rel",
        "6":"rev",
        "shape":/^(rect|rectangle|circ|circle|poly|polygon)$/,
        "7":"type"
    }
};

/*END EXTEND*/
/************/

jQuery(function() {

    jQuery('.wymeditor').wymeditor({
        stylesheet: './plugin/wymeditor/skins/silver/skin.css',
        html: '<h2 class="dc_title" property="dc:title"><?= $dc['dc_title']; ?><\/h2>'
		    + '<h3 class="dc_subject" property="dc:subject"><?= $dc['dc_subject']; ?><\/h3>'
		    + '<h3 class="dc_creator" property="dc:creator"><?= $dc['dc_creator']; ?><\/h3>'
            + '<p class="dc_description" property="dc:description"><?= $dc['dc_description']; ?><\/p>'
            + '<p class="dc_contributor" property="dc:"><?= $dc['dc_contributor']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_publisher']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_identifier']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_relation']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_source']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_rights']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_format']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_type']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_date']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_coverage']; ?><\/p>'
            + '<p class="dc_" property="dc:"><?= $dc['dc_language']; ?><\/p>'
            + '',

        postInit: function(wym) {

            //set the classes panel as dropdown
            jQuery(wym._box).find('div.wym_classes').hide();

            //construct the panel
            jQuery(wym._box).find('div.wym_area_right')
                .append('<div class="wym_attributes wym_section wym_panel"><\/div>')
                .children(':last')
                .append('<h2>Attributes<\/h2>')
                .append('<ul><\/ul>')
                .children(':last')
                //store the attribute name/value in the button class (better idea?)
                .append('<li><a class="about" title="What the data is about." href="#">ABOUT: about #value#<\/a><\/li>')
                .append('<li><a class="property dc_title" title="A name by which the resource is formally known." href="#">TITLE: prop dc:title<\/a><\/li>')
                .append('<li><a class="property dc_subject" title="주제" href="#">SUBJECT: prop dc:subject<\/a><\/li>')
                .append('<li><a class="property dc_creator" title="An entity primarily responsible for making the resource." href="#">CREATOR: prop dc:creator<\/a><\/li>')
                .find('a')
                //event handlers
                .click( function() {

                    //init
                    var selected  = wym.selected(),                         //selected container
                        classes   = jQuery(this).attr('class').split(' '),  //clicked button classes
                        attrName  = classes[0],                             //attribute name, e.g. 'property'
                        attrValue = classes.length > 1 ? classes[1] : null; //attribute value, if available, e.g. dc_title

                    //the attribute already exists, remove it
                    if( jQuery(selected).attr(attrName) != undefined && jQuery(selected).attr(attrName) != '') {
                        WYMeditor.console.log('attribute already exists, remove it:', attrName, jQuery(selected).attr(attrName));
                        if( classes.length == 1 || jQuery(selected).attr(attrName) == attrValue.replace('_', ':') )
                            jQuery(selected).removeAttr(attrName).removeClass(attrName).removeClass(attrValue);

                    //else, add it (and the feedback class)
                    } else {
                        WYMeditor.console.log('attribute does not exist, add it:', attrName, attrValue);
                        if( classes.length > 1 ) { //value available
                            jQuery(selected).attr(attrName, attrValue.replace('_', ':')).addClass(attrValue);
                        } else { //value not available
                            attrValue = prompt('Value', '');
                            if(attrValue != null) jQuery(selected).attr(attrName, attrValue).addClass(attrName);
                        }
                    }
                });

            //feedback css
            var rules = [
              { name: '.about',
                css: 'background-color: #f99;' },
              { name: '.dc_subject',
                css: 'background-color: #999;' },
              { name: '.dc_creator',
                css: 'background-color: #9f9;' },
              { name: '.dc_title',
                css: 'background-color: #9ff;' },
              { name: '.foaf_Person',
                css: 'background-color: #69c;' },
              { name: '.foaf_name',
                css: 'background-color: #99c;' },
              { name: '.foaf_homepage',
                css: 'background-color: #c9c;' },
              { name: '.foaf_mbox',
                css: 'background-color: #c6c;' },
              { name: '.foaf_phone',
                css: 'background-color: #c3c;' }
            ];
            wym.addCssRules( wym._doc, rules);
        }
    });
});

</script>

<form method="post" action="">
<textarea class="wymeditor" name="dublincore"></textarea>
<input type="submit" class="wymupdate" value="확인" />
</form>
	<?= $dc['rdf_about']; ?>
<?php
}
?>