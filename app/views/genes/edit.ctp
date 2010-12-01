<div class="genes form">
<?php echo $this->Form->create('Gene');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Gene', true)); ?></legend>
	<?php
		echo $this->Form->input('Id');
		echo $this->Form->input('gene_name');
		echo $this->Form->input('gene_oficial_name');
		echo $this->Form->input('synonims');
		echo $this->Form->input('summary');
		echo $this->Form->input('chr');
		echo $this->Form->input('g_start');
		echo $this->Form->input('g_end');
		echo $this->Form->input('strand');
		echo $this->Form->input('specie_id');
		echo $this->Form->input('esbn_id');
		echo $this->Form->input('Ensembl_id');
		echo $this->Form->input('dna_seq');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Gene.Id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Gene.Id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Genes', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Species', true)), array('controller' => 'species', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Specie', true)), array('controller' => 'species', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Refseqs', true)), array('controller' => 'refseqs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Refseq', true)), array('controller' => 'refseqs', 'action' => 'add')); ?> </li>
	</ul>
</div>