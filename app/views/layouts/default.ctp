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
</head>
<link type="text/css" href="/~fnavarro/retroDB2/css/smoothness/jquery-ui-1.8.7.custom.css" rel="Stylesheet" />
<script type="text/javascript" src="/~fnavarro/retroDB2/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="/~fnavarro/retroDB2/js/jquery-ui-1.8.7.custom.min.js"></script>
	<script>
	$(function() {
		$( ".column",".column_t" ).sortable({
			connectWith: ".column"
		});

		$( ".portlet_t" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header_t" )
				.addClass( "ui-widget-header_t ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
				.end()
			.find( ".portlet-content_t" );

		$( ".portlet" ).addClass( "ui-widget ui-widget-content ui-helper-clearfix ui-corner-all" )
			.find( ".portlet-header" )
				.addClass( "ui-widget-header ui-corner-all" )
				.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
				.end()
			.find( ".portlet-content" );

		$( ".portlet-header_t .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
			$( this ).parents( ".portlet_t:first" ).find( ".portlet-content_t" ).toggle();
		});

		$( ".portlet-header .ui-icon" ).click(function() {
			$( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
			$( this ).parents( ".portlet:first" ).find( ".portlet-content" ).toggle();
		});

		$( ".column",".column_t" ).disableSelection();
		$( ".column",".column_t" ).sortable( "option", "disabled", true );
	});
	</script>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1>
		</div>

		<div id="search">
			<div class="search_b">
				<?php echo $form->create("Retrogenes",array('type' => 'post','action' => 'search'));	?>
				<div class="search_top">
				<?php echo $form->input("specie_id", array('label' => 'Specie:','div' => false,'options' => array(1=>'Human',2=>'Chimp',3=>'Rhesus',4=>'Mouse',5=>'Rat',6=>'Dog',7=>'Zebrafish',8=>'Drosophila'))); ?>
				</div>
				<div class="search_bottom">
				<?php echo $form->input("search_string", array('div' => false,'label' => false,'alt'=>'Possible searches:Retrogene Name, Parental Gene, ESEMBL Id, UCSC Id, chromosome position (chr18:6462091-9679493; chr18)'))." ".$form->button('Search',array('name' => 'Search','class'=>'button search_active','div' => false,'type' => 'submit'))." ".$form->button('Clear', array('type'=>'reset','class'=>'button reset_button'))." ".$form->end();  ?>
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
