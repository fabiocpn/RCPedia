<div class="species view">
<h2><?php  __('Species');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $species['Species']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sci Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $species['Species']['sci_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Abreviation'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $species['Species']['abreviation']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('GenomeBuild'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $species['Species']['genomeBuild']; ?>
			&nbsp;
		</dd>
	<br><br>
	<?php echo $this->Html->image("http://chart.apis.google.com/chart?chxr=0,0,22500&chxt=y&chbh=a&chs=300x225&cht=bvg&chco=A2C180,3D7930&chds=0,22500,0,22500&chd=t:".$genes."|".$retro."&chdl=Gene|Retrogene&chma=|0,5&chtt=Retrogene+Proportion"); ?>&nbsp;
	<?php echo $this->Html->image("http://chart.apis.google.com/chart?chs=350x225&cht=pc&chd=s:DHm&chl=Exonic|Intronic|Intergenic&chtt=Retrogene+Genomic+Regions&chts=676767,12.5"); ?>
	<br><br><br>
	<dd>
	<center>
	<?php echo $this->Html->image("http://www.compbio.ludwig.org.br/~fnavarro/circos/".$species['Species']['abreviation'].".png",Array("width" => 450,"height" => 450)); ?>
	</center>
	</dd>
	</dl>
	
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Species', true)), array('action' => 'index')); ?> </li>
	</ul>
</div>
