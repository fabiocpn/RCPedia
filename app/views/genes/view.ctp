<div class="view">
	<div class="column_t">
		<a id="parental"></a>
		<div class="portlet_t">
			<div class="portlet-header_t">Paretal Gene Summary</div>
			<div class="portlet-content_t">
				<dl><?php $i = 0; $class = ' class="altrow"';?>
					<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gene Name'); ?></dt>
					<dd<?php if ($i++ % 2 == 0) echo $class;?>>
						<?php echo $gene['Gene']['gene_name']; ?>
						&nbsp;
					</dd>
					<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Full Name'); ?></dt>
					<dd<?php if ($i++ % 2 == 0) echo $class;?>>
						<?php echo $gene['Gene']['gene_oficial_name']; ?>
						&nbsp;
					</dd>
					<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Specie'); ?></dt>
					<dd<?php if ($i++ % 2 == 0) echo $class;?>>
						<?php echo $this->Html->link($gene['Specie']['sci_name'], array('controller' => 'species', 'action' => 'view', $gene['Specie']['id'])); ?>
						&nbsp;
					</dd>
					<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Also known as'); ?></dt>
					<dd<?php if ($i++ % 2 == 0) echo $class;?>>
						<?php echo $gene['Gene']['synonims']; ?>
						&nbsp;
					</dd>
					<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Coordinate'); ?></dt>
					<dd<?php if ($i++ % 2 == 0) echo $class;?>>
						<div class="c_actions">
							<?php echo $gene['Gene']['chr'].":".$gene['Gene']['g_start']."-".$gene['Gene']['g_end']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 				<?php echo $this->Html->link('UCSC GB', "http://genome.ucsc.edu/cgi-bin/hgTracks?".$gene['Specie']['ucsc_prefix']."&position=".$gene['Gene']['chr']."%3A".$gene['Gene']['g_start']."-".$gene['Gene']['g_end'],array('target'=>'_blank')); ?>
						</div>
					</dd>
					<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Strand'); ?></dt>
					<dd<?php if ($i++ % 2 == 0) echo $class;?>>
						<?php echo $gene['Gene']['strand']; ?>
						&nbsp;
					</dd>
					<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Summary'); ?></dt>
					<dd<?php if ($i++ % 2 == 0) echo $class;?>>
						<?php echo $gene['Gene']['summary']; ?>
						&nbsp;
					</dd>
				</dl>
			</div>
		</div>	

		<a id="g_retrogenes"></a>
		<div class="portlet_t">
			<div class="portlet-header_t">Retrocopy(s) Graphical Representation</div>
			<div class="portlet-content_t">
				<center>
				<?php echo $this->Html->image("http://www.bioinfo.mochsl.org.br/~fnavarro/circos/new/".$gene['Gene']['Id'].".circos.png",Array("width" => 300,"height" => 300)); ?>
				</center>
			</div>
		</div>

		<a id="retrocopies"></a>
		<div class="portlet_t">
			<div class="portlet-header_t"><?php printf(__('Retrocopy(s) from %s', true), __($gene['Gene']['gene_name'], true));?></div>
			<div class="portlet-content_t">
					<?php if (!empty($retrogenes)):?>
					<table cellpadding = "0" cellspacing = "0">
					<tr>
						<th><?php __('Retrocopy'); ?></th>
						<th><?php __('Chr'); ?></th>
						<th><?php __('Start'); ?></th>
						<th><?php __('End'); ?></th>
						<th><?php __('Strand'); ?></th>
						<th><?php __('Genomic Region'); ?></th>
						<th class="actions"></th>
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
							<td><?php echo $retrogene['Retrogenes']['t_id'];?></td>
							<td><?php echo $retrogene['Retrogenes']['chr'];?></td>
							<td><?php echo $retrogene['Retrogenes']['g_start'];?></td>
							<td><?php echo $retrogene['Retrogenes']['g_end'];?></td>
							<td><?php echo $retrogene['Retrogenes']['strand'];?></td>
							<td><?php echo $retrogene['Retrogenes']['g_region']; ?></td>
							<td class="actions">
				 				<?php echo $this->Html->link(__('Details', true), array('controller' => 'retrocopies','action' => 'view', $retrogene['Retrogenes']['id'])); ?>
				 				<?php echo $this->Html->link('UCSC GB', "".$retrogene['Retrogenes']['ucsc_track'],array('target'=>'_blank')); ?>
				 			</td>
				
						</tr>
					<?php endforeach; ?>
					</table>
					<?php endif; ?>
			</div>
		</div>
		<a id="refseqs"></a>
		<div class="portlet_t">
			<div class="portlet-header_t">NCBI Reference Sequence(s) (mRNAs)</div>
			<div class="portlet-content_t">
				<?php if (!empty($gene['Refseq'])):?>
				<table cellpadding = "0" cellspacing = "0">
					<tr>
						<th><?php __('RefSeq Id'); ?></th>
						<th class="actions">&nbsp;</th>
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
							<td><?php echo $this->Html->link(__($refseq['seqacc'], true), "http://www.ncbi.nlm.nih.gov/sites/entrez?Db=nuccore&Cmd=DetailsSearch&Term=".$refseq['seqacc']); ?></td>
							<td class="actions">
								<?php echo $this->Html->link(__('UCSC GB', true), "http://genome.ucsc.edu/cgi-bin/hgTracks?".$gene['Specie']['ucsc_prefix']."&position=".$refseq['chr']."%3A".$refseq['g_start']."-".$refseq['g_end']); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</table>
				<?php endif; ?>
			</div>
		</div>
		<a id="related_sequences"></a>
		<div class="portlet_t">
			<div class="portlet-header_tl">Related Sequences</div>
			<div class="portlet-content_t">
					<?php if (!empty($retrogenes)):?>
					<?php echo "<br>>".$gene['Refseq'][0]['seqacc'] ."<br><pre>". wordwrap (strtolower($gene['Refseq'][0]['sequence']),50,'<br>',true) ."</pre><br>" ?>
					<?php
						$i = 0;
						foreach ($retrogenes as $retrogene):
							$class = null;
							if ($i++ % 2 == 0) {
								$class = ' class="altrow"';
							}
						?>
							<?php echo ">".$retrogene['Retrogenes']['t_id']."_".$retrogene['Retrogenes']['chr']."<br><pre>". wordwrap (strtolower($retrogene['Retrogenes']['sequence']),50,'<br>',true) . "</pre><br>"; ?>

					<?php endforeach; ?>
					<?php endif; ?>
			</div>
		</div>
		<a id="malignment"></a>
		<div class="portlet_t">
			<div class="portlet-header_t">Alignment: Parental Gene X Retrocopy(s)</div>
			<div class="portlet-content_t">
				<font size=-2>
				<pre>
				<?php echo $gene['Gene']['malignment']?>
				</pre>
				</font>		
			</div>
		</div>
	</div>
</div>
	<div class="menu">
		<div class="column">
			<div class="portlet">
				<div class="portlet-header">Table of Contents</div>
				<div class="portlet-content">
						<a href="#search">Search</a><br>
						<a href="#parental">Parental Summary</a><br>
						<a href="#g_retrogenes">Retrocopies Movement</a><br>
						<a href="#retrocopies">Retrocopies</a><br>
						<a href="#refseqs">NCBI Ref. Sequence(s)</a><br>
						<a href="#related_sequences">Related Sequences</a><br>
						<a href="#malignment">Retrocopy alignment</a><br>
				</div>
			</div>
			<div class="portlet">
				<div class="portlet-header">External Links</div>
				<div class="portlet-content">
						<?php echo $this->Html->link("NCBI", "http://www.ncbi.nlm.nih.gov/gene/".$gene['Gene']['ncbi_id']); ?>&nbsp;<br>
						<?php echo $this->Html->link("UCSC", "http://genome.ucsc.edu/cgi-bin/hgGene?hgg_gene=".$gene['Gene']['ucsc_id']."&hgg_chrom=".$gene['Gene']['chr']."&hgg_start=".$gene['Gene']['g_start']."&hgg_end=".$gene['Gene']['g_end']."&hgg_type=knownGene&db=hg19"); ?>&nbsp;<br>
						<?php echo $this->Html->link("KEGG", "http://www.genome.jp/dbget-bin/www_bget?hsa:".$gene['Gene']['ncbi_id']); ?>&nbsp;<br>
						<a>HPRD</a><br>
				</div>
			</div>
			<div class="portlet">
				<div class="portlet-header">Contact</div>
				<div class="portlet-content">
						<?php echo $this->Html->image('ContactStuff.png',array('width'=>20))."&nbsp;&nbsp;"; echo $this->Html->link("Feedback", "http://www.bioinfo.mochsl.org.br/rcpedia/pages/contact?c_url=".$_SERVER["REQUEST_URI"]); ?>&nbsp;<br>
				</div>
			<div>
		</div>
	</div>
</div>
