<div class="species form">
<?php echo $this->Form->create('Species');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Species', true)); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('sci_name');
		echo $this->Form->input('abreviation');
		echo $this->Form->input('genomeBuild');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Species', true)), array('action' => 'index'));?></li>
	</ul>
</div>