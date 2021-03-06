<div class="view">
		<div class="column_t">
			<div class="portlet_t">
				<a id="summary"></a>
				<div class="portlet-header_t">Retrocopy Summary</div>
				<div class="portlet-content_t">
					<dl><?php $i = 0; $class = ' class="altrow"';?>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Retrocopy Name'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo "RC".$retrogene['Retrogene']['t_id']; ?>
							&nbsp;
						</dd>
							
						<?php if ( strcmp($retrogene['Retrogene']['put_annotation'] ,"") == 0 ) echo "<!--";?>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Putative Annotation'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['put_annotation']; ?>
							&nbsp;
						</dd>
						<?php if ( strcmp($retrogene['Retrogene']['put_annotation'] ,"") == 0 ) echo "-->";?>

						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Specie'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $this->Html->link($retrogene['Specie']['sci_name'], array('controller' => 'species', 'action' => 'view', $retrogene['Specie']['id'])); ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Coordinates'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<div class="c_actions">
								<?php echo $retrogene['Retrogene']['chr'].":".$retrogene['Retrogene']['g_start']."-".$retrogene['Retrogene']['g_end']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php echo $this->Html->link('UCSC GB', "".$retrogene['Retrogene']['ucsc_track'],array('target'=>'_blank')); ?>
							</div>
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Strand'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['strand']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parental sequence'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Refseq']['seqacc'].".".$retrogene['Refseq']['version']; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parental seq. overlap'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['abs_overlap']." (".sprintf("%01.2f",$retrogene['Retrogene']['per_overlap']*100)."%)"; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Parental seq. identity'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo sprintf("%01.2f",$retrogene['Retrogene']['ident']*100)."%"; ?>
							&nbsp;
						</dd>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Insertion point'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php echo $retrogene['Retrogene']['g_region']; ?>
							&nbsp;
						</dd>
						<?php if ( strcmp($retrogene['Retrogene']['direct_repeat'] ,"") == 0 ) echo "<!--";?>
						<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flanking DRs'); ?></dt>
						<dd<?php if ($i++ % 2 == 0) echo $class;?>>
							<?php $teste = split('[@]', strtoupper($retrogene['Retrogene']['direct_repeat'])); 
        						  	if ( !empty($teste[0]) ) $one = split('[;]',$teste[0]);
                                    if ( !empty($teste[1]) ) $two = split('[;]',$teste[1]);
									if ( !empty($teste[2]) ) $three = split('[;]',$teste[2]);

								echo "<table border=1 CELLSPACING=0 cellpadding=\"0\"><tr>";
								if ( !empty($one[0]) )   echo "<td><center><font size=1>$one[0]</font></td>";
								if ( !empty($two[0]) )   echo "<td><center><font size=1>$two[0]</td>";
								if ( !empty($three[0]) ) echo "<td><center><font size=1>$three[0]</td>";
								echo "</tr><tr>";
								if ( !empty($one[2]) )   echo "<td><center><pre>".str_replace("#","\n",$one[2])."</td>";
								if ( !empty($two[2]) )   echo "<td><center><pre>".str_replace("#","\n",$two[2])."</td>";
								if ( !empty($three[2]) ) echo "<td><center><pre>".str_replace("#","\n",$three[2])."</td>";
								echo "</tr><tr>";
								if ( !empty($one[1]) )   echo "<td><center><font size=1>$one[1]</td>";
								if ( !empty($two[1]) )   echo "<td><center><font size=1>$two[1]</td>";
								if ( !empty($three[1]) ) echo "<td><center><font size=1>$three[1]</td>";
								echo "</tr></table>";

	
							; ?>
							&nbsp;
						</dd>
						<?php if ( strcmp($retrogene['Retrogene']['direct_repeat'] ,"") == 0 ) echo "-->";?>
					</dl>
				</div>
			</div>

		<?php if ( $retrogene['Retrogene']['specie_id'] == 11 ) echo "<!--";?>
			<div class="portlet_t">
				<a id="context"></a>
				<div class="portlet-header_t">Genomic Context</div>
				<div class="portlet-content_t">
					<dl>
						<dt>
    							<?php echo "<iframe id=\"sviframe\" src=\"http://www.ncbi.nlm.nih.gov/projects/sviewer/embedded_iframe.html?iframe=sviframe&embedded=minimal&noslider=true&id=".$retrogene['Chr_accession']['accession']."&tracks=[key:gene_model_track,Options:GeneOnly]&from=".($retrogene['Retrogene']['g_start']-100000)."&to=".($retrogene['Retrogene']['g_end']+100000)."&mk=".$retrogene['Retrogene']['g_start'].":".$retrogene['Retrogene']['g_end']."|Retrocopy\" width=\"800\" height=\"250\" ></iframe>"; ?>
						</dt>
					</dl>
				</div>
			</div>
		<?php if ( $retrogene['Retrogene']['specie_id'] == 11 ) echo "-->";?>

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


			<?php if ( strcmp($retrogene['Retrogene']['g_region'] ,"Intergenic") == 0 ) echo "<!--";?>
			<div class="portlet_t">
				<a id="parental"></a>
				<div class="portlet-header_t">Host Gene - <?php echo $retrogene['Retrogene']['g_region']?></div>
				<div class="portlet-content_t">
					<dl><?php $i = 0; $class = ' class="altrow"';?>
						<dt <?php if ($i % 2 == 0) echo $class;?>>Gene Name</dt>
							<dd <?php if ($i++ % 2 == 0) echo $class;?>>
								<b><?php echo $retrogene['TGene']['gene_name']; ?></b>&nbsp;
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
			<?php if ( strcmp($retrogene['Retrogene']['g_region'] ,"Intergenic") == 0 ) echo "-->";?>

			<div class="portlet_t">
				<a id="conservation"></a>
				<div class="portlet-header_t">Interspecies Conservation</div>
				<div class="portlet-content_t">
					<table class='def_img'>
						<?php echo $conserved ?>
					</table>
					<!--	<table class='def_img'>
							<tr><td><?php echo $this->Html->image('hs_on.jpg',array('width'=>250)) ?></td></tr>
							<tr><td><?php echo $this->Html->image('pt_on.jpg',array('width'=>250))?></td></tr>
							<tr><td><?php echo $this->Html->image('gg_on.jpg',array('width'=>250))?></td></tr>
							<tr><td><?php echo $this->Html->image('pa_on.jpg',array('width'=>250))?></td></tr>
							<tr><td><?php echo $this->Html->image('rm_on.jpg',array('width'=>250))?></td></tr>
							<tr><td><?php echo $this->Html->image('cj_on.jpg',array('width'=>250))?></td></tr>
						</table>
					-->
					</div>					
				</div>
		<?php if ( $retrogene['Retrogene']['specie_id'] == 10 ) echo "<!--";?>
			<div class="portlet_t">
				<a id="expression"></a>
				<div class="portlet-header_t">Expression</div>
				<div class="portlet-content_t">


				    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
				    <script type="text/javascript">
				      google.load('visualization', '1', {packages: ['corechart']});
				    </script>
				    <script type="text/javascript">
				      function drawVisualization() {
				        // Create and populate the data table.
				        var data = google.visualization.arrayToDataTable([

						<?php 
							$tissues = "";
							$exp_values = "";
							$one_color = "['Tissue','Number of reads'],";
							foreach ( $retrogene['Expression'] as $tissue ):
								$one_color .= "['".$tissue['tissue']."',".$tissue['support']."],";
								$tissues .= "'".$tissue['tissue']."',";
								$exp_values .= $tissue['support'].",";
							endforeach;
							$exp_values = substr_replace($exp_values,"",-1);
							$one_color = substr_replace($one_color,"",-1);
							$tissues = substr_replace($tissues,"",-1);

							echo "[ 'Year',$tissues ], [ 'Tissue',$exp_values ]";
							#echo "$one_color";
						?>
				        ]);
      
				        // Create and draw the visualization.
				        new google.visualization.ColumnChart(document.getElementById('visualization')).
				            draw(data,
				                 {title:"Retrocopy expression (RNA-seq data)",
				                  width:600, height:400,
				                  vAxis: {title: "Number of reads",minValue:0, viewWindow:{min:0}}
							     
							     }
				            );
			    	  }
      

				      google.setOnLoadCallback(drawVisualization);
				    </script>

					<div id="visualization" style="width: 600px; height: 400px;"></div>
				</div>
			</div>
		<?php if ( $retrogene['Retrogene']['specie_id'] == 10 ) echo "-->";?>

			<div class="portlet_t">
				<a id="alignment"></a>
				<div class="portlet-header_t">Alignment - Retrocopy x Parental Gene</div>
				<div class="portlet-content_t">
					<font size=-2>
					<pre>
					<?php echo $retrogene['Retrogene']['malignment'] ?>
					</pre>
					</font>		
				</div>
			</div>
			<div class="portlet_t">
				<a id="sequences"></a>
				<div class="portlet-header_t">Related Sequences</div>
				<div class="portlet-content_t">
					<?php echo ">".$retrogene['Retrogene']['t_id']."<br><pre>". wordwrap (strtolower($retrogene['Retrogene']['sequence']),50,'<br>',true) . "</pre><br>"; ?>
					<?php echo ">".$retrogene['Refseq']['seqacc'].".".$retrogene['Refseq']['version']."<br><pre>". wordwrap (strtolower($retrogene['Refseq']['sequence']),50,'<br>',true). "</pre><br>"; ?>
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
		<?php if ( $retrogene['Retrogene']['specie_id'] == 11 ) echo "<!--";?>
						<a href="#context">Genomic Context</a><br>
		<?php if ( $retrogene['Retrogene']['specie_id'] == 11 ) echo "-->";?>
						<a href="#parental">Parental Gene</a><br>
		<?php if ( $retrogene['Retrogene']['specie_id'] == 10 ) echo "<!--";?>
						<a href="#expression">Expression</a><br>
		<?php if ( $retrogene['Retrogene']['specie_id'] == 10 ) echo "-->";?>
						<a href="#alignment">Parental Alignment</a><br>
						<a href="#conservation">Interspecie Conservation</a><br>
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
			<div class="portlet">
				<div class="portlet-header">Contact</div>
				<div class="portlet-content">
						<?php echo $this->Html->image('ContactStuff.png',array('width'=>20))."&nbsp;&nbsp;"; echo $this->Html->link("Feedback", "http://www.bioinfo.mochsl.org.br/rcpedia/pages/contact?c_url=".$_SERVER["REQUEST_URI"]); ?>&nbsp;<br>
				</div>
			</div>
		</div>
	</div>
</div>

