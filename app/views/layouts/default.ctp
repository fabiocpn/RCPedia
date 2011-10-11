<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
	?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-821948-6']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<link type="text/css" href="/rcpedia/css/smoothness/jquery-ui-1.8.7.custom.css" rel="Stylesheet" />
<script type="text/javascript" src="/rcpedia/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/rcpedia/js/jquery-ui-1.8.7.custom.min.js"></script>
	<script>
	$(function() {
		$( ".column",".column_t" ).sortable({
			connectWith: ".column"
		});

		$( ".portlet_t" ).addClass( "ui-widget_t ui-widget-content_t ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header_t" )
				.addClass( "ui-widget-header_t ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-circle-triangle-n'></span>")
				.prepend( "<span class='ui-icon-top ui-icon-arrowthickstop-1-n'></span>")
				.end()
			.find( ".portlet-content_t" );

		$( ".portlet_t_col" ).addClass( "ui-widget_t ui-widget-content_t ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header_t_col" )
				.addClass( "ui-widget-header_t ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-circle-triangle-s'></span>")
				.prepend( "<span class='ui-icon-top ui-icon-arrowthickstop-1-n'></span>")
				.end()
			.find( ".portlet-content_t" ).hide();

		$( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header" )
				.addClass( "ui-widget-header ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-circle-triangle-n'></span>")
				.end()
			.find( ".portlet-content" );

		$( ".portlet-header_t .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-circle-triangle-s" ).toggleClass( "ui-icon-circle-triangle-n" );
			$( this ).parents( ".portlet_t:first" ).find( ".portlet-content_t" ).toggle();
		});

		$( ".portlet-header_t .ui-icon-top" ).click(function() {
			$('body').scrollTop(0);
		});

		$( ".portlet-header_t_col .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-circle-triangle-n" ).toggleClass( "ui-icon-circle-triangle-s" );
			$( this ).parents( ".portlet_t_col:first" ).find( ".portlet-content_t" ).toggle();
		});

		$( ".portlet-header_t_col .ui-icon-top" ).click(function() {
			$('body').scrollTop(0);
		});

		$( ".portlet-header .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-circle-triangle-s" ).toggleClass( "ui-icon-circle-triangle-n" );
			$( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
		});

		$( ".column",".column_t" ).disableSelection();
		$( ".column",".column_t" ).sortable( "option", "disabled", true );
	});
	</script>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('RCPedia', true), 'http://www.bioinfo.mochsl.org.br/rcpedia/');?>&nbsp;&nbsp;&nbsp;
				<?php echo $this->Html->link(__('Statistics', true), 'http://www.bioinfo.mochsl.org.br/rcpedia/pages/statistics');?>&nbsp;&nbsp;&nbsp;
				<?php echo $this->Html->link(__('Credits', true), 'http://www.bioinfo.mochsl.org.br/rcpedia/pages/credits');?> &nbsp;&nbsp;&nbsp;
				<?php echo $this->Html->link(__('Publications', true), 'http://www.bioinfo.mochsl.org.br/rcpedia/pages/publications');?> &nbsp;&nbsp;&nbsp;
				<?php echo $this->Html->link(__('Contact', true), 'http://www.bioinfo.mochsl.org.br/rcpedia/pages/contact');?> &nbsp;&nbsp;&nbsp;
			</h1>
		</div>

		<div id="search">
			<!--<?php echo $this->Html->image("../img/logo.png",Array("class" => "floatleft")); ?>--!>
			<div class="search_b">
				<?php echo $form->create("Retrogenes",array('name' => 'Retrogenes', 'type' => 'post','action' => 'search'));	?>
				<div class="search_top">
				<?php echo $form->input("specie_id", array('label' => 'Specie:','div' => false,'options' => array(1=>'Human',2=>'Chimp',3=>'Rhesus',4=>'Mouse',5=>'Rat',6=>'Dog',7=>'Zebrafish',8=>'Drosophila'))); ?>
				</div>
				<div class="search_bottom">
				<?php echo $form->input("search_string", array('div' => false,'label' => false,'alt'=>'Possible searches:Retrogene Name, Parental Gene, ESEMBL Id, UCSC Id, chromosome position (chr18:6462091-9679493; chr18)'))." ".$form->button('Search',array('name' => 'Search','class'=>'button search_active','div' => false,'type' => 'submit'))." ".$form->button('Clear', array( 'name' => 'clear', 'type'=>'reset','class'=>'button reset_button','onClick' => "document.getElementById('data[Retrogenes][specie_id]').value='';"))." ".$form->end();  ?>
				</div>
			</div>
		</div>

		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
		</div>

	</div>
	<!--<?php echo $this->element('sql_dump'); ?>-->
</body>
</html>
