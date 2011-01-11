<div class="view">
		<div class="column_t">
			<div class="portlet_t">
				<a id="summary"></a>
				<div class="portlet-header_t">Retrogene Summary</div>
				<div class="portlet-content_t">
					<dl><?php $i = 0; $class = ' class="altrow"';?>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Retrogene Name'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['t_id']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Specie'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Specie']['name']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Coordinate'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<div class="c_actions">
								<?php echo $retrogene['Retrogene']['chr'].":".$retrogene['Retrogene']['g_start']."-".$retrogene['Retrogene']['g_end']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				 				<?php echo $this->Html->link('UCSC GB', "http://genome.ucsc.edu/cgi-bin/hgTracks?".$retrogene['Specie']['ucsc_prefix']."&position=".$retrogene['Retrogene']['chr']."%3A".$retrogene['Retrogene']['g_start']."-".$retrogene['Retrogene']['g_end']."&hgt.customText=".$ucsc_hg_customText); ?>
							</div>
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Strand'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['strand']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Overlap (nt)'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['overlap']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Identity'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['ident']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Genomic Region'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['g_region']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RefSeq'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Refseq']['seqacc'].".".$retrogene['Refseq']['version']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Method'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Method']['name']; ?>
							&nbsp;
						</dd>
					</dl>
				</div>
			</div>

			<div class="portlet_t">
				<a id="parental"></a>
				<div class="portlet-header_t">Parental Gene</div>
				<div class="portlet-content_t">
					<dl><?php $i = 0; $class = ' class="altrow"';?>
						<dt <?php if ($i % 2 == 0) echo $class;?>>Gene Name</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $this->Html->link($retrogene['Gene']['gene_name'], array('controller' => 'genes', 'action' => 'view', $retrogene['Refseq']['gene_id'])); ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Full Name</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['Gene']['full_name']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Also known as</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['Gene']['synonims']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Coordinate</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['Gene']['chr'].":".$retrogene['Gene']['g_start']."-".$retrogene['Gene']['g_end']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Strand</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['Gene']['strand']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Summary</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['Gene']['summary']; ?>&nbsp;
							</dd>
						</dt>
					</dl>
				</div>
			</div>

			<div class="portlet_t_col">
				<a id="alignment"></a>
				<div class="portlet-header_t_col">Alignment - Retrogene x Parental Gene</div>
				<div class="portlet-content_t">
					<font size=-2>
					<?php echo $alignment?>
					</font>		
				</div>
			</div>
			<div class="portlet_t_col">
				<a id="conservation"></a>
				<div class="portlet-header_t_col">Interspecie Conservation</div>
				<div class="portlet-content_t">
					&nbsp;
				</div>
			</div>
			<div class="portlet_t_col">
				<a id="dNdS"></a>
				<div class="portlet-header_t_col">dN/dS</div>
				<div class="portlet-content_t">
					&nbsp;
				</div>
			</div>
			<div class="portlet_t_col">
				<a id="sequences"></a>
				<div class="portlet-header_t_col">Related Sequences</div>
				<div class="portlet-content_t">
					<?php echo ">".$retrogene['Retrogene']['t_id']."<br><pre>". wordwrap (strtolower($retrogene['Retrogene']['sequence']),50,'<br>',true) . "</pre><br>"; ?>
					<?php echo ">".$retrogene['Refseq']['seqacc'].".".$retrogene['Refseq']['version']."<br><pre>". wordwrap (strtolower($retrogene['Refseq']['sequence']),50,'<br>',true). "</pre><br>"; ?>
					<?php echo ">RefSeq_CDS<br><pre>". wordwrap (strtolower($retrogene['Refseq']['cds_seq']),50,'<br>',true). "</pre><br>"; ?>
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
						<a href="#summary">Summary</a><br>
						<a href="#parental">Parental Gene</a><br>
						<a href="#alignment">Alignment</a><br>
						<a href="#conservation">Interspecie Conservation</a><br>
						<a href="#dNdS">dN/dS</a><br>
						<a href="#sequences">Related Sequences</a><br>
				</div>
			</div>
			<div class="portlet">
				<div class="portlet-header">External Links</div>
				<div class="portlet-content">
						<a>NCBI</a><br>
						<a>KEGG</a><br>
						<a>HPRD</a><br>
				</div>
			</div>
		</div>
	</div>
</div>
