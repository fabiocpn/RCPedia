<div class="refseqs index">
	<h2><?php __('Refseqs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('seqacc');?></th>
			<th><?php echo $this->Paginator->sort('n_exons');?></th>
			<th><?php echo $this->Paginator->sort('gene_id');?></th>
			<th><?php echo $this->Paginator->sort('chr');?></th>
			<th><?php echo $this->Paginator->sort('g_start');?></th>
			<th><?php echo $this->Paginator->sort('g_end');?></th>
			<th><?php echo $this->Paginator->sort('strand');?></th>
			<th><?php echo $this->Paginator->sort('sequence');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($refseqs as $refseq):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $refseq['Refseq']['id']; ?>&nbsp;</td>
		<td><?php echo $refseq['Refseq']['seqacc']; ?>&nbsp;</td>
		<td><?php echo $refseq['Refseq']['n_exons']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($refseq['Gene']['Id'], array('controller' => 'genes', 'action' => 'view', $refseq['Gene']['Id'])); ?>
		</td>
		<td><?php echo $refseq['Refseq']['chr']; ?>&nbsp;</td>
		<td><?php echo $refseq['Refseq']['g_start']; ?>&nbsp;</td>
		<td><?php echo $refseq['Refseq']['g_end']; ?>&nbsp;</td>
		<td><?php echo $refseq['Refseq']['strand']; ?>&nbsp;</td>
		<td><?php echo $refseq['Refseq']['sequence']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $refseq['Refseq']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Genes', true)), array('controller' => 'genes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Retrogenes', true)), array('controller' => 'retrogenes', 'action' => 'index')); ?> </li>
	</ul>
</div>
