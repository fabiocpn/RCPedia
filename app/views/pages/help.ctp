<div class="page">
        <h1>Help</h1>
<h2>Search box</h2>
<tex>
<center><?php echo $this->Html->image('help/search_box.png',array('width'=>600)) ?></center><br><br>
 <div align="justify">
RCPedia usage orbitates its querying system, therefore, the only way of getting the right answers is by asking the right questions. We make available four ways of querying for retrocopy events:<br><br>
- Coordinates (chr18 or chr18 23747811 23751321 or chr18:23747811-23751321);<br>
- Parental gene (DHFR,RPL21,GAPDH);<br>
- Target gene (TF,ERBB2);<br>
- And some less specific keywords such as "kinase","transcription factor"<br><br>

Humans have the most curated and annotated genome, however, it is also possible to change the queried organism. We make available queries for retrocopies on six primate genomes: Humans, Chimpanzee, Gorilla, Orangutan, Rhesus and Marmoset. 
</div>
</tex><br><br>
 <div align="justify">

<h2>Interpreting the results</h2>
<h1>Search results</h1>
<tex>
 <div align="justify">
Filling the search box with your favorite gene and hitting submit will forward you to all retrocopies of the searched term. For example, when searching for "DHFR" on Human:
<center><?php echo $this->Html->image('help/search_res.png',array('width'=>600)) ?></center><br><br>
Here you have a few options:<br>
<li> Follow to the parental perspective by clicking on the <b>gene name</b> (DHFR in this case), which will gather all information about retrocopies from a parental gene;</li><br>
<li>Follow to the retrocopy perspective by clicking on <b>"Details"</b>, which will show all information about a single genomic loci;</li><br>
<li>See the genomic context of the retrocopy by clicking on the link <b>"UCSC GB"</b> which stands for UCSC Genome Browser.</li><br>

</div>
</tex>
<h1>Parental perspective</h1>
<tex>
 <div align="justify">
Parental perspective is one of the many ways to investigate retrocopies. In this view you can see a compilation of all data gathered about retrocopies from a specific protein coding gene.<br><br>
<center><?php echo $this->Html->image('help/parental_summary.png',array('width'=>600)) ?></center>
Summary block compiles information, such as, Full Name, Genomic coordinate, Strand and Summary about its function.<br><br>
<center><?php echo $this->Html->image('help/parental_movements.png',array('width'=>600)) ?></center>
A graphical representation representing the movements of the duplications is also available. Outermost blocks represent the organism chromosomes, lines on the center represents the movements of the sequence. On DHFR for example there are six duplications and they are shown by links leaving the coordinate on chromosome 5 and arriving on the insertion point where the retrocopy is now located.<br><br>

<center><?php echo $this->Html->image('help/parental_rcps.png',array('width'=>600)) ?></center>
Very similar to the search results we also provide a compilation of all retrocopies from a given parental gene.<br><br>

<center><?php echo $this->Html->image('help/parental_transcripts.png',array('width'=>600)) ?></center>
The "NCBI Reference Sequence" shows all transcripts used in our analysis.<br><br>

<center><?php echo $this->Html->image('help/parental_malignment.png',array('width'=>600)) ?></center>
And finally a landscape of the retrocopy sequence is also provided by the multiple alignment of all retrocopies against the transcript of the parental gene. This overview enables the user to detect, for example, old and recent retrocopies by its similarity to the parental sequence.<br><br><br>
</div>
</tex>
<h1>Retrocopy perspective</h1>
<tex>
 <div align="justify">
Retrocopy perspective is the main source of information for a specific genomic locus annotated as retrocopy. Here we present all available information of a recently described retrocopy with putative function: DHFRL1.<br><br>

<center><?php echo $this->Html->image('help/rcp_summary.png',array('width'=>600)) ?></center>
Summary block is a compilation of the information for a genomic locus annotated as retrocopy by RCPedia. Here we make available the genomic coordinate, identity of the retrocopy sequence compared to the parental sequence, the percentage of the parental sequence that was duplicated, putative direct repeats flanking the insertion, genomic context and finally, the putative parental transcript that was used as template during the reverse transcription process.<br><br>

<center><?php echo $this->Html->image('help/rcp_context.png',array('width'=>600)) ?></center>
Genomic context is really important for retrocopies since the event may take advantage of neighbor promoters to get expressed. Here we make available a browsable window where one may see the genes nearby the retrocopy locus.<br><br>
<center><?php echo $this->Html->image('help/rcp_parental.png',array('width'=>600)) ?></center>
Parental block compiles information about the gene that was duplicated by the retrotransposition event.<br><br>
<center><?php echo $this->Html->image('help/rcp_conservation.png',array('width'=>600)) ?></center>
Interspecies conservation block shows if the event has an orthologous sequence on other organisms. All orthologous events are clickable and forward the user to the retrocopy event on the respective organism.<br><br>
<center><?php echo $this->Html->image('help/rcp_expression.png',array('width'=>600)) ?></center>
Based on publicly available RNA-seq data, we were able to detect the expression of retrocopies in Human, Chimp, Gorilla, Orangutan and Rhesus in six tissues: Brain, Cerebellum, Heart, Kidney, Liver and Testis. This block shows a representation of the expression level of the genomic locus annotated as retrocopy by the number of reads supporting the expression of the genomic region.<br><br>
<center><?php echo $this->Html->image('help/rcp_malignment.png',array('width'=>600)) ?></center>
Alignment Retrocopy x Parental gene shows the similarity of the sequences of the retrocopy and the putative transcript used as template during the reverse transcription.<br><br>
<center><?php echo $this->Html->image('help/rcp_relseq.png',array('width'=>600)) ?></center>
Finally, we also make available the sequences cited above if the user wants to investigate further the retrocopy and parental sequence.<br><br>
</div>
</tex>
</div>

