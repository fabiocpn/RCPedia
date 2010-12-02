<div class="retrogenes index">

<?php
        echo $form->create("Retrogenes",array('type' => 'post','action' => 'searchbycoord'));
        echo $form->input("coord_q", array('label' => 'Search for Retrogenes'));
        echo $form->end("Search");
?>


	<?php include 'table_body.template';?>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
	</ul>
</div>
