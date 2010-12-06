<div class="retrogenes index">

<?php
	echo $form->create("Retrogenes",array('type' => 'post','action' => 'search'));
	echo $form->input("search_string", array('label' => 'Search for Retrogenes','alt'=>'Possible searches:Retrogene Name, Parental Gene, ESEMBL Id, UCSC Id, chromosome position (chr18:6462091-9679493; chr18)'));
	echo $form->input("specie_id", array('options' => array(1=>'Human',2=>'Chimp',3=>'Rhesus',4=>'Mouse',5=>'Rat',6=>'Dog',7=>'Zebrafish',8=>'Drosophila')));
	echo $form->end("Search");
?>


	<?php include 'table_body.template';?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
	</ul>
</div>
