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
						<?php echo $this->Html->link($gene['Specie']['name'], array('controller' => 'species', 'action' => 'view', $gene['Specie']['id'])); ?>
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
			 				<?php echo $this->Html->link('UCSC GB', "http://genome.ucsc.edu/cgi-bin/hgTracks?".$gene['Specie']['ucsc_prefix']."&position=".$gene['Gene']['chr']."%3A".$gene['Gene']['g_start']."-".$gene['Gene']['g_end']); ?>
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
				<?php echo $this->Html->image("http://www.bioinfo.mochsl.org.br/~fnavarro/circos/".$gene['Gene']['specie_id']."/".$gene['Gene']['gene_name'].".png",Array("width" => 300,"height" => 300)); ?>
				</center>
			</div>
		</div>

		<a id="retrogenes"></a>
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
						<th><?php __('Method'); ?></th>
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
							<td><?php echo $retrogene['Method']['name'];?></td>
							<td class="actions">
				 				<?php echo $this->Html->link(__('Details', true), array('controller' => 'retrogenes','action' => 'view', $retrogene['Retrogenes']['id'])); ?>
				 				<?php echo $this->Html->link('UCSC GB', "http://genome.ucsc.edu/cgi-bin/hgTracks?".$gene['Specie']['ucsc_prefix']."&position=".$retrogene['Retrogenes']['chr']."%3A".$retrogene['Retrogenes']['g_start']."-".$retrogene['Retrogenes']['g_end']."&hgt.customText=".$ucsc_hg_customText); ?>
				 			</td>
				
						</tr>
					<?php endforeach; ?>
					</table>
					<?php endif; ?>
			</div>
		</div>
		<a id="refseqs"></a>
		<div class="portlet_t_col">
			<div class="portlet-header_t_col">NCBI Reference Sequence(s) (mRNAs)</div>
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
		<div class="portlet_t_col">
			<div class="portlet-header_t_col">Related Sequences</div>
			<div class="portlet-content_t">
					<?php if (!empty($retrogenes)):?>
					<?php echo $refseq_seq ?>
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
				<?php echo $alignment?>
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
						<a href="#g_retrogenes">Retrocopy(s) Graphical Representation</a><br>
						<a href="#retrogenes">Retrocopy(s)</a><br>
						<a href="#refseqs">NCBI Reference Sequence(s)</a><br>
						<a href="#related_sequences">Related Sequences</a><br>
						<a href="#malignment">Alignment: Parental Gene X Retrocopy(s)</a><br>
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
		</div>
	</div>
</div>
