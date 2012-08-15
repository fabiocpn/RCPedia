<?php print_r($retrogene['Expression']) ?>
<div class="view">
		<div class="column_t">
			<div class="portlet_t">
				<a id="summary"></a>
				<div class="portlet-header_t">Retrocopy Summary</div>
				<div class="portlet-content_t">
					<dl><?php $i = 0; $class = ' class="altrow"';?>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Retrocopy Name'); ?></dt>
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
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('RefSeq Overlap'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['abs_overlap']." (".sprintf("%01.2f",$retrogene['Retrogene']['per_overlap']*100)."%)"; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Identity'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo sprintf("%01.2f",$retrogene['Retrogene']['ident']*100)."%"; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flanking DRs'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<div class="none">
							<?php $teste = split('[@]', strtoupper($retrogene['Retrogene']['direct_repeat'])); 
        						  	$one = split('[;]',$teste[0]);
                                    $two = split('[;]',$teste[1]);
									$three = split('[;]',$teste[2]);
								echo "<table border=1 CELLSPACING=0 cellpadding=\"0\"><tr><td><center><font size=1>$one[0]</font></td><td><center><font size=1>$two[0]</td><td><center><font size=1>$three[0]</td></tr>";
								echo "<tr><td><center><pre>".str_replace("#","\n",$one[2])."</td><td><center><pre>".str_replace("#","\n",$two[2])."</td><td><center><pre>".str_replace("#","\n",$three[2])."</td></tr>";
								echo "<tr><td><center><font size=1>$one[1]</td><td><center><font size=1>$two[1]</td><td><center><font size=1>$three[1]</td></tr></table>";

	
							; ?>
							&nbsp;
							</div>
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
			<div class="portlet_t_col">
				<a id="dNdS"></a>
				<div class="portlet-header_t_col">Genomic Context</div>
				<div class="portlet-content_t">
					<dl>
						<dt>
								<!--<?php echo "<iframe src=\"http://genome.ucsc.edu/cgi-bin/hgTracks?".$retrogene['Specie']['ucsc_prefix']."&position=".$retrogene['Retrogene']['chr']."%3A".($retrogene['Retrogene']['g_start']-5000)."-".($retrogene['Retrogene']['g_end']+5000)."&hgt.customText=".$ucsc_hg_customText."\" Frameborder=0 scrolling=auto width=830 height=800></iframe>"; ?>&nbsp; -->


						</dt>
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
								<?php echo $retrogene['Gene']['gene_oficial_name']; ?>&nbsp;
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


			<?php if ( strcmp($retrogene['Retrogene']['g_region'] ,"intergenic") == 0 ) echo "<!--";?>
			<div class="portlet_t">
				<a id="parental"></a>
				<div class="portlet-header_t">Target Gene - <?php echo $retrogene['Retrogene']['g_region']?></div>
				<div class="portlet-content_t">
					<dl><?php $i = 0; $class = ' class="altrow"';?>
						<dt <?php if ($i % 2 == 0) echo $class;?>>Gene Name</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $this->Html->link($retrogene['TGene']['gene_name'], array('controller' => 'genes', 'action' => 'view', $retrogene['Retrogene']['target_gene_id'])); ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Full Name</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['TGene']['gene_oficial_name']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Also known as</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['TGene']['synonims']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Coordinate</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['TGene']['chr'].":".$retrogene['TGene']['g_start']."-".$retrogene['TGene']['g_end']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Strand</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['TGene']['strand']; ?>&nbsp;
							</dd>	
						<dt <?php if ($i % 2 == 0) echo $class;?>>Summary</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<?php echo $retrogene['TGene']['summary']; ?>&nbsp;
							</dd>
						</dt>
					</dl>
				</div>
			</div>
			<?php if ( strcmp($retrogene['Retrogene']['g_region'] ,"intergenic") == 0 ) echo "-->";?>

			<div class="portlet_t_col">
				<a id="alignment"></a>
				<div class="portlet-header_t_col">Alignment - Retrocopy x Parental Gene</div>
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
				<a id="sequences"></a>
				<div class="portlet-header_t_col">Related Sequences</div>
				<div class="portlet-content_t">
					<?php echo ">".$retrogene['Retrogene']['t_id']."<br><pre>". wordwrap (strtolower($retrogene['Retrogene']['sequence']),50,'<br>',true) . "</pre><br>"; ?>
					<?php echo ">".$retrogene['Refseq']['seqacc'].".".$retrogene['Refseq']['version']."<br><pre>". wordwrap (strtolower($retrogene['Refseq']['sequence']),50,'<br>',true). "</pre><br>"; ?>
					<?php #echo ">RefSeq_CDS<br><pre>". wordwrap (strtolower($retrogene['Refseq']['cds_seq']),50,'<br>',true). "</pre><br>"; ?>
				</div>
			</div>
			<div class="portlet_t">
				<a id="expression"></a>
				<div class="portlet-header_t_col">Expression</div>
				<div class="portlet-content_t">

				
					<?php 
						$tissues = "";
						$exp_values = "";
						foreach ( $retrogene['Expression'] as $tissue ):
							$tissues .= "|".$tissue['tissue'];
							$exp_values .= $tissue['support'].",";
							//echo $tissue['tissue'].":".$tissue['support']."<br>";
						endforeach;
						$exp_values = substr_replace($exp_values,"",-1);

						echo "<img src=\"http://chart.apis.google.com/chart?chxl=0:$tissues&chxr=0,0,1&chxs=0,676767,10,0,lt,676767&chxt=x,y&chbh=a,4,10&chs=400x300&cht=bvs&chd=t:$exp_values \" width=\"400\" height=\"300\" alt=\"\" />";
					?>&nbsp;
					
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

						<?php echo $this->Html->link("NCBI", "http://www.ncbi.nlm.nih.gov/gene/".$retrogene['Gene']['ncbi_id']); ?>&nbsp;<br>
						<?php echo $this->Html->link("UCSC", "http://genome.ucsc.edu/cgi-bin/hgGene?hgg_gene=".$retrogene['Gene']['ucsc_id']."&hgg_chrom=".$retrogene['Gene']['chr']."&hgg_start=".$retrogene['Gene']['g_start']."&hgg_end=".$retrogene['Gene']['g_end']."&hgg_type=knownGene&db=hg19"); ?>&nbsp;<br>
						<?php echo $this->Html->link("KEGG", "http://www.genome.jp/dbget-bin/www_bget?hsa:".$retrogene['Gene']['ncbi_id']); ?>&nbsp;<br>
						<a>HPRD</a><br>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="padding:10px;">
<div id="sv1" class="SeqViewerApp" >
<a href="?embedded=true&id=NC_003284&from=13598210&to=13599776"> </a>
</div>
</div>
