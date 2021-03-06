<div class="species index">
	<h2><?php __('Species');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('sci_name');?></th>
			<th><?php echo $this->Paginator->sort('abreviation');?></th>
			<th><?php echo $this->Paginator->sort('genomeBuild');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($species as $species):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $species['Species']['id']; ?>&nbsp;</td>
		<td><?php echo $species['Species']['name']; ?>&nbsp;</td>
		<td><?php echo $species['Species']['sci_name']; ?>&nbsp;</td>
		<td><?php echo $species['Species']['abreviation']; ?>&nbsp;</td>
		<td><?php echo $species['Species']['genomeBuild']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $species['Species']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $species['Species']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $species['Species']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $species['Species']['id'])); ?>
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
