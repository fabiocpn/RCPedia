<div class="methods form">
<?php echo $this->Form->create('Method');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Method', true)); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('reference');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Methods', true)), array('action' => 'index'));?></li>
	</ul>
</div>