<div class="retrogenes index">

<?php
        echo $form->create("Retrogenes",array('type' => 'post','action' => 'search'));
        echo $form->input("search_string", array('label' => 'Search for Retrogenes'));
		echo $form->input("specie_id", array('options' => array(1=>'Human',2=>'Chimp',3=>'Rhesus',4=>'Mouse',5=>'Rat',6=>'Dog',7=>'Zebrafish',8=>'Drosophila')));
        echo $form->end("Search");
?>


	<h2><?php __('Retrogenes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Specie','Specie.name');?></th>
			<th><?php echo $this->Paginator->sort('Parental Gene','Gene.gene_name');?></th>
			<th><?php echo $this->Paginator->sort('Chr','chr');?></th>
			<th><?php echo $this->Paginator->sort('Start','g_start');?></th>
			<th><?php echo $this->Paginator->sort('End','g_end');?></th>
			<th><?php echo $this->Paginator->sort('Strand','strand');?></th>
			<th><?php echo $this->Paginator->sort('Identity(%)','ident');?></th>
			<th><?php echo $this->Paginator->sort('Method','Method.name');?></th>
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
		<td><?php echo $this->Html->link($retrogene['Specie']['name'], array('controller' => 'species', 'action' => 'view', $retrogene['Specie']['id'])); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($retrogene['Gene']['gene_name'], array('controller' => 'genes', 'action' => 'view', $retrogene['Refseq']['gene_id'])); ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['chr']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['g_start']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['g_end']; ?>&nbsp;</td>
		<td><?php echo $retrogene['Retrogene']['strand']; ?>&nbsp;</td>
		<td><?php $p_val = $retrogene['Retrogene']['ident']*100; printf("%01.2f", $p_val); ?>&nbsp;</td>
		<td><?php echo $retrogene['Method']['name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link('View', "http://genome.ucsc.edu/cgi-bin/hgTracks?org=&db=NCBI37&position=".$retrogene['Retrogene']['chr']."%3A".$retrogene['Retrogene']['g_start']."-".$retrogene['Retrogene']['g_end']); ?>
			<?php echo $this->Html->link(__('Details', true), array('action' => 'view', $retrogene['Retrogene']['id'])); ?>
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
	</ul>
</div>
