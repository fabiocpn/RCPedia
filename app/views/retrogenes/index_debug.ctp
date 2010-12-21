<div class="retrogenes index">
	<h2><?php __('Retrogenes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Specie','Specie.name');?></th>
			<th><?php echo $this->Paginator->sort('Parental Gene','Gene.gene_name');?></th>
			<th><?php echo $this->Paginator->sort('Chr','chr');?></th>
			<th><?php echo $this->Paginator->sort('Start','g_start');?></th>
			<th><?php echo $this->Paginator->sort('End','g_end');?></th>
			<th><?php echo $this->Paginator->sort('Strand','strand');?></th>
			<th><?php echo $this->Paginator->sort('Identity','ident');?></th>
			<th><?php echo $this->Paginator->sort('Method','Method.name');?></th>
			<th><?php echo $this->Paginator->sort('id','Retrogene Id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($retrogenes as $retrogene):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $retrogene['Specie']['name']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Gene']['gene_name']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['chr']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['g_start']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['g_end']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['strand']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['ident']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Method']['name']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['id']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $retrogene['Retrogene']['id'])); ?>
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
