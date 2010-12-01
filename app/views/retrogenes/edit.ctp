<div class="retrogenes form">
<?php echo $this->Form->create('Retrogene');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Retrogene', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('t_id');
		echo $this->Form->input('specie_id');
		echo $this->Form->input('refseq_id');
		echo $this->Form->input('chr');
		echo $this->Form->input('g_start');
		echo $this->Form->input('g_end');
		echo $this->Form->input('strand');
		echo $this->Form->input('overlap');
		echo $this->Form->input('ident');
		echo $this->Form->input('distance');
		echo $this->Form->input('sequence');
		echo $this->Form->input('g_region');
		echo $this->Form->input('method_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Retrogene.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Retrogene.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Retrogenes', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Refseqs', true)), array('controller' => 'refseqs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Refseqs', true)), array('controller' => 'refseqs', 'action' => 'add')); ?> </li>
	</ul>
</div>