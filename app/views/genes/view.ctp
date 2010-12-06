
<div class="retrogenes index">
<?php
	echo $form->create("Retrogenes",array('type' => 'post','action' => 'search'));
	echo $form->input("search_string", array('label' => 'Search for Retrogenes','alt'=>'Possible searches:Retrogene Name, Parental Gene, ESEMBL Id, UCSC Id, chromosome position (chr18:6462091-9679493; chr18)'));
	echo $form->input("specie_id", array('options' => array(1=>'Human',2=>'Chimp',3=>'Rhesus',4=>'Mouse',5=>'Rat',6=>'Dog',7=>'Zebrafish',8=>'Drosophila')));
	echo $form->end("Search");
?>
	<h2><?php printf(__('Retrogenes from %s', true), __($gene['Gene']['gene_name'], true));?></h2>
	<?php if (!empty($retrogenes)):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Chr'); ?></th>
		<th><?php __('Start'); ?></th>
		<th><?php __('End'); ?></th>
		<th><?php __('Strand'); ?></th>
		<th><?php __('Method'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	<tr>
	<?php
		$i = 0;
		foreach ($retrogenes as $retrogene):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $retrogene['Retrogenes']['id'];?></td>
			<td><?php echo $retrogene['Retrogenes']['chr'];?></td>
			<td><?php echo $retrogene['Retrogenes']['g_start'];?></td>
			<td><?php echo $retrogene['Retrogenes']['g_end'];?></td>
			<td><?php echo $retrogene['Retrogenes']['strand'];?></td>
			<td><?php echo $retrogene['Method']['name'];?></td>
			<td class="actions">
 				<?php echo $this->Html->link(__('Details', true), array('controller' => 'retrogenes','action' => 'view', $retrogene['Retrogenes']['id'])); ?>
 				<?php echo $this->Html->link('UCSC GB', "http://genome.ucsc.edu/cgi-bin/hgTracks?org=&db=NCBI37&position=".$retrogene['Retrogenes']['chr']."%3A".$retrogene['Retrogenes']['g_start']."-".$retrogene['Retrogenes']['g_end']); ?>
 			</td>

		</tr>
	<?php endforeach; ?>
	</table>
	<?php endif; ?>
<br><br>
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
</div>

<div>
</div>

<div>
	<table border=0><tr><td width=60%>
	<dl>
		<h3><?php  __('Parental Gene');?></h3>
	</dl>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gene['Gene']['Id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gene Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gene['Gene']['gene_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Full Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gene['Gene']['full_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aliases'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gene['Gene']['synonims']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Summary'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gene['Gene']['summary']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Coordinate'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<div class="c_actions">
				<?php echo $gene['Gene']['chr'].":".$gene['Gene']['g_start']."-".$gene['Gene']['g_end']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 				<?php echo $this->Html->link('View', "http://genome.ucsc.edu/cgi-bin/hgTracks?org=&db=NCBI37&position=".$gene['Gene']['chr']."%3A".$gene['Gene']['g_start']."-".$gene['Gene']['g_end']); ?>
			</div>
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Strand'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gene['Gene']['strand']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Specie'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($gene['Specie']['name'], array('controller' => 'species', 'action' => 'view', $gene['Specie']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ensembl Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gene['Gene']['Ensembl_id']; ?>
			&nbsp;
		</dd>
	</dl>
	</td><td>
		<?php echo $this->Html->image("http://www.compbio.ludwig.org.br/~fnavarro/circos/".$gene['Gene']['specie_id']."/".$gene['Gene']['gene_name'].".png",Array("width" => 300,"height" => 300)); ?>
	</td></tr></table>
</div>

<div class="related">
	<h3><?php printf(__('Related %s', true), __('Refseqs', true));?></h3>
	<?php if (!empty($gene['Refseq'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Seqacc'); ?></th>
		<th><?php __('N Exons'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($gene['Refseq'] as $refseq):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $refseq['id'];?></td>
			<td><?php echo $refseq['seqacc'];?></td>
			<td><?php echo $refseq['n_exons'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Details', true), array('controller' => 'refseqs', 'action' => 'view', $refseq['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
