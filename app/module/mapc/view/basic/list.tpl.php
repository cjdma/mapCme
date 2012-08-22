<link rel="stylesheet" href="module/mapc/view/basic/list.css" />

<section id="content">

	<section id="options" class="clearfix">

	<h3>Sort</h3>

	<ul id="sort-by" class="option-set clearfix" data-option-key="sortBy">
		<li><a href="#sortBy=original-order" data-option-value="original-order" class="selected" data>original-order</a></li>
		<li><a href="#sortBy=name" data-option-value="name">name</a></li>
		<li><a href="#sortBy=symbol" data-option-value="symbol">symbol</a></li>
		<li><a href="#sortBy=number" data-option-value="number">number</a></li>
		<li><a href="#sortBy=weight"  data-option-value="weight">weight</a></li>
		<li><a href="#sortBy=category" data-option-value="category">category</a></li>
		<li><a href="#sortBy=random" data-option-value="random">random</a></li>
	</ul>

	<h3>Sort direction</h3>

	<ul id="sort-direction" class="option-set clearfix" data-option-key="sortAscending">
		<li><a href="#sortAscending=true" data-option-value="true" class="selected">sort ascending</a></li>
		<li><a href="#sortAscending=false" data-option-value="false">sort descending</a></li>
	</ul>

	</section> <!-- #options -->

	<div id="container_gie3" class="clearfix">

		<?php
			foreach($dc_list as $key => $var) {
		?>

		<div class="element">
			<a href="http://www.flickr.com/photos/nemoorange/5013039951/" title="Stanley by Dave DeSandro, on Flickr"><img src="http://farm5.static.flickr.com/4113/5013039951_3a47ccd509.jpg" alt="Stanley" /></a>
			<p class="number"><?= $var['dc_title']; ?></p>
			<h3 class="symbol"><?= $var['dc_subject']; ?></h3>
			<h2 class="name"><?= $var['dc_contributor']; ?></h2>
			<p class="subject"><?= $var['dc_subject']; ?></p>
		</div>

		<?php
			}
		?>
	</div> <!-- #container -->

<script type="text/javascript" src="<?= APP_PATH; ?>plugin/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?= APP_PATH; ?>plugin/isotope/jquery.isotope.min.js"></script>

</section> <!-- #content -->
	<script type="text/javascript">
		$(function(){

			var $container = $('#container_gie3');

			$container.imagesLoaded( function(){

				$container.isotope({

					itemSelector : '.element'

				});

			});

		});
	</script>

<?php
/*
<script>
$(function(){
  
  var $container = $('#container');
  
  $container.isotope({
	itemSelector : '.element',
	getSortData : {
	  symbol : function( $elem ) {
		return $elem.attr('data-symbol');
	  },
	  category : function( $elem ) {
		return $elem.attr('data-category');
	  },
	  number : function( $elem ) {
		return parseInt( $elem.find('.number').text(), 10 );
	  },
	  weight : function( $elem ) {
		return parseFloat( $elem.find('.subject').text().replace( /[\(\)]/g, '') );
	  },
	  name : function ( $elem ) {
		return $elem.find('.name').text();
	  }
	}
  });
  
  
  var $optionSets = $('#options .option-set'),
	  $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('.option-set');
	$optionSet.find('.selected').removeClass('selected');
	$this.addClass('selected');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }
	var options = {},
		key = $optionSet.attr('data-option-key'),
		value = $this.attr('data-option-value');
	// parse 'false' as false boolean
	value = value === 'false' ? false : value;
	options[ key ] = value;
	if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	  // changes in layout modes need extra logic
	  changeLayoutMode( $this, options )
	} else {
	  // otherwise, apply new options
	  $container.isotope( options );
	}
	
	return false;
  });

  
});
</script>
*/
?>
