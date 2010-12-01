<div class="refseqs view">
<h2><?php  __('Refseq');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Seqacc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['seqacc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('N Exons'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['n_exons']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gene'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($refseq['Gene']['Id'], array('controller' => 'genes', 'action' => 'view', $refseq['Gene']['Id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Chr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['chr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('G Start'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['g_start']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('G End'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['g_end']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Strand'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['strand']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sequence'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refseq['Refseq']['sequence']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Refseqs', true)), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Genes', true)), array('controller' => 'genes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Retrogenes', true)), array('controller' => 'retrogenes', 'action' => 'index')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php printf(__('Related %s', true), __('Retrogenes', true));?></h3>
	<?php if (!empty($refseq['Retrogene'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('T Id'); ?></th>
		<th><?php __('Specie Id'); ?></th>
		<th><?php __('Refseq Id'); ?></th>
		<th><?php __('Chr'); ?></th>
		<th><?php __('G Start'); ?></th>
		<th><?php __('G End'); ?></th>
		<th><?php __('Strand'); ?></th>
		<th><?php __('Overlap'); ?></th>
		<th><?php __('Ident'); ?></th>
		<th><?php __('Distance'); ?></th>
		<th><?php __('Sequence'); ?></th>
		<th><?php __('G Region'); ?></th>
		<th><?php __('Method Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($refseq['Retrogene'] as $retrogene):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $retrogene['id'];?></td>
			<td><?php echo $retrogene['t_id'];?></td>
			<td><?php echo $retrogene['specie_id'];?></td>
			<td><?php echo $retrogene['refseq_id'];?></td>
			<td><?php echo $retrogene['chr'];?></td>
			<td><?php echo $retrogene['g_start'];?></td>
			<td><?php echo $retrogene['g_end'];?></td>
			<td><?php echo $retrogene['strand'];?></td>
			<td><?php echo $retrogene['overlap'];?></td>
			<td><?php echo $retrogene['ident'];?></td>
			<td><?php echo $retrogene['distance'];?></td>
			<td><?php echo $retrogene['sequence'];?></td>
			<td><?php echo $retrogene['g_region'];?></td>
			<td><?php echo $retrogene['method_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'retrogenes', 'action' => 'view', $retrogene['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
		</ul>
	</div>
</div>
