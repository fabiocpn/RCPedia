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
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link(__('CakePHP: the rapid development php framework', true), 'http://cakephp.org'); ?></h1>
		</div>


		<div id="search">
				<h1>Seach</h1>
			<div class="search_b">
				<?php echo $form->create("Retrogenes",array('type' => 'post','action' => 'search'));	?>
				<div class="search_top">
				<?php echo $form->input("specie_id", array('div' => false,'options' => array(1=>'Human',2=>'Chimp',3=>'Rhesus',4=>'Mouse',5=>'Rat',6=>'Dog',7=>'Zebrafish',8=>'Drosophila'))); ?>
				</div>
				<div class="search_bottom">
				<?php echo $form->input("search_string", array('div' => false,'label' => false,'alt'=>'Possible searches:Retrogene Name, Parental Gene, ESEMBL Id, UCSC Id, chromosome position (chr18:6462091-9679493; chr18)'))." ".$form->button('Search',array('name' => 'Search','class'=>'button search_button','div' => false,'type' => 'submit'))." ".$form->button('Clear', array('type'=>'reset','class'=>'button reset_button'))." ".$form->end();  ?>
				</div>
			</div>
		</div>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<!--<?php echo $this->element('sql_dump'); ?>-->
</body>
</html>
