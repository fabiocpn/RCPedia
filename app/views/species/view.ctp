
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
    </script>
    <script type="text/javascript">

	  function init() {
			drawVisualization_gregion();
		    drawVisualization_count();
	  }

      function drawVisualization_gregion() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
          ['Region', ''],
          ['Intergenic', <?php echo $gregion_inter ?>],
          ['Intragenic (opposite strand)', <?php echo $gregion_intraoppo?>],
          ['Intragenic (same strand)', <?php echo $gregion_intrasame ?>]
        ]);
      
        var options = {
          'chartArea':{width:"100%"},
          'legend':{'position': 'right', 'alignment':'center' },
        };
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization')).
            draw(data, options);
      }
      

      function drawVisualization_count() {
        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
          ['', 'Genes', 'Retrocopies'],
          ['',  <?php echo $genes ?>, <?php echo $retro ?>]
        ]);
      
        // Create and draw the visualization.
		        new google.visualization.ColumnChart(document.getElementById('visualization_genes')).
            draw(data, { width:600, height:400, 'legend':{'position': 'bottom'} } );
      }
      

      google.setOnLoadCallback(init);
    </script>

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
	<br><br><br>
	<table><tr><td>
	<center>
	<font size=-2><b>
	Genome summary</b></font></center><br>
	<div id="visualization_genes" style="width: 500px; height: 400px;"></div>
	</td><td>
	<center>
	<font size=-2><b>
	Retrocopies genomic context</b></font></center><br>
	<div id="visualization" style="width: 500px; height: 400px;"></div>
	</td></tr>
	</table>

	<center>
	<font size=-2><b>
	Graphical representation of organism retrocopies</b></font><br>
	<?php echo $this->Html->image("http://www.bioinfo.mochsl.org.br/~fnavarro/circos/circos.".strtolower($species['Species']['abreviation']).".png",Array("width" => 450,"height" => 450)); ?>
	</center>
	
</div>
