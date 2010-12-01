<div class="refseqs form">
<?php echo $this->Form->create('Refseq');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Refseq', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('seqacc');
		echo $this->Form->input('n_exons');
		echo $this->Form->input('gene_id');
		echo $this->Form->input('chr');
		echo $this->Form->input('g_start');
		echo $this->Form->input('g_end');
		echo $this->Form->input('strand');
		echo $this->Form->input('sequence');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Refseq.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Refseq.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Refseqs', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Genes', true)), array('controller' => 'genes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Gene', true)), array('controller' => 'genes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Retrogenes', true)), array('controller' => 'retrogenes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Retrogene', true)), array('controller' => 'retrogenes', 'action' => 'add')); ?> </li>
	</ul>
</div>