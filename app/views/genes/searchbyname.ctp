<div class="genes index">

<h2><?php __('Genes');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('Gene_name');?></th>
	<th><?php echo $this->Paginator->sort('Full_name');?></th>
	<th><?php echo $this->Paginator->sort('Chr');?></th>
	<th><?php echo $this->Paginator->sort('g_start');?></th>
	<th><?php echo $this->Paginator->sort('g_end');?></th>
	<th><?php echo $this->Paginator->sort('strand');?></th>
	<th><?php echo $this->Paginator->sort('specie_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($genes as $gene):
$class = null;
if ($i++ % 2 == 0) {
	$class = ' class="altrow"';
}
?>
<tr<?php echo $class;?>>
<td><?php echo $gene['Gene']['gene_name']; ?>&nbsp;</td>
<td><?php echo $gene['Gene']['full_name']; ?>&nbsp;</td>
<td><?php echo $gene['Gene']['chr']; ?>&nbsp;</td>
<td><?php echo $gene['Gene']['g_start']; ?>&nbsp;</td>
<td><?php echo $gene['Gene']['g_end']; ?>&nbsp;</td>
<td><?php echo $gene['Gene']['strand']; ?>&nbsp;</td>
<td>
	<?php echo $this->Html->link($gene['Specie']['name'], array('controller' => 'species', 'action' => 'view', $gene['Specie']['id'])); ?>
</td>
<td class="actions">
	<?php echo $this->Html->link(__('View', true), array('action' => 'view', $gene['Gene']['Id'])); ?>
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
<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Species', true)), array('controller' => 'species', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Refseqs', true)), array('controller' => 'refseqs', 'action' => 'index')); ?> </li>
	</ul>
</div>
