<div class="page">
	<h1>Welcome to RCPedia</h1>
	<tex>
	A complete database for retrocopies (processed pseudogenes and retrogenes) from Group of Bioinformatics at IEP, Hospital Sírio Libanês.
	We currently indexed retrocopies from 6 primates genomes:<br>
	<ul>
	<li><?php echo $this->Html->link('Human', array('controller' => 'species', 'action' => 'view', 1)); ?></li>
	<li><?php echo $this->Html->link('Chimp', array('controller' => 'species', 'action' => 'view', 2)); ?></li>
	<li><?php echo $this->Html->link('Gorilla', array('controller' => 'species', 'action' => 'view', 11)); ?></li>
	<li><?php echo $this->Html->link('Orangutan', array('controller' => 'species', 'action' => 'view', 9)); ?></li>
	<li><?php echo $this->Html->link('Rhesus', array('controller' => 'species', 'action' => 'view', 3)); ?></li>
	<li><?php echo $this->Html->link('Marmoset', array('controller' => 'species', 'action' => 'view', 10)); ?></li>
	<!-- <li>Mouse</li>
	<li>Rat</li>
	<li>Zebrafish</li> -->
	</ul>
	</tex>
		<br>
		<h1>Getting Started</h1>
		<tex>
		 <div align="justify">
			Retrocopy is the result of a process in which mRNAs are reverse-transcribed into cDNA and inserted back into a new position on the genome, usually by retroelement machinery. Since the retrocopies are based on mature mRNA they lack many of their parental genes' genetic features, such as introns and regulatory elements. Most retrocopies have turned into pseudogenes (also known as processed pseudogenes) in mammals and some of them may recruit upstream regulatory elements and become functional.
		</div>
		<br><br><center><?php echo $this->Html->image('retrocopies.png',array('width'=>300)) ?><!--<img src=/retrocopies.png width=300>--></center><br>
		<h1>Search</h1>
		 <div align="justify">
			RCPedia is based on search mechanisms. Retrocopy events can be searched on the top search box by <b>coordinates</b>, such as chr1 or chr1:78275455-79988153, which returns all retrocopies located whithin the search area. Furthermore, it's yet possible to search for retrocopies using their <b>name</b>, <b>parental official gene name</b>, <b>full name</b> and, finally, by <b>parental gene description</b>.
		</div>
	</tex>
</div>

<div class="news">
	<h1><b>Latest News</b></h1>
	<ul>
		<li><b>2012-09-15</b>: Beta version of the RCPedia</li>
		<li><b>2011-12-22</b>: Alpha version of the RCPedia</li>
		<li><b>2011-11-10</b>: Initial Project Design and Development</li>
	</ul>
</div>
