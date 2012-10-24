	
	<div class="index">	
		<a id="search_res"></a>
		<?php include 'table_body.template';?>
	</div>
<!--<?php echo $this->element('sql_dump'); ?>-->
	<div class="menu">
		<div class="column">
			<div class="portlet">
				<div class="portlet-header">Table of Contents</div>
				<div class="portlet-content">
					<a href="#search">Search</a><br>
					<a href="#search_res">Search Results</a><br>
					<a href="#pages">Pages</a><br>
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
