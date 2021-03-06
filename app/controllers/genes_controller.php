<?php
class GenesController extends AppController {

	var $name = 'Genes';
	var $uses = array ('Gene','Refseqs','Retrogenes');

	function index() {
		$this->Gene->recursive = 0;
		$this->set('genes', $this->paginate());
	}

	function searchbyname( ) {
		if(!isset($this->data) && ( $this->params['url']['url'] == "genes/searchbyname" || $this->params['url']['url'] == "genes/searchbyname/" ) ){
			$this->Session->delete('gene_name');
		} 
		if(isset($this->data['Genes']['gene_name_q'])) {
			$this->Session->write('gene_name',$this->data['Genes']['gene_name_q']);
		}

		if ( $this->Session->read('gene_name') ) {
			$this->set('genes', $this->paginate("Gene", Array ( 'Gene.gene_name LIKE' => "%".$this->Session->read('gene_name')."%" ) ) );
		} else {
			$this->set('genes', $this->paginate("Gene", Array ( 'Gene.specie_id' => 0 ) ) );

		}	
	}

	function view($id = null) {

    	$this->set('title_for_layout', 'Parental Gene');    

		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'gene'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gene', $this->Gene->read(null, $id));
		$this->set('retrogenes', $this->Retrogenes->find('all',array ( 'order' => array('Retrogenes.ident' => 'DESC'),'joins' => array ( array ('table' => 'refseqs', 'alias' => 'Refseq', 'type' => 'inner', 'conditions' => array('Retrogenes.refseq_id = Refseq.id') ), array ( 'table' => 'genes', 'alias' => 'Gene', 'type' => 'inner', 'conditions' => array ( 'Refseq.gene_id = Gene.id') ), array ( 'table' => 'methods', 'alias' => 'Method', 'type' => 'inner', 'conditions' => array ( 'Retrogenes.method_id = Method.id' ) ) ), 'conditions' => array ('Gene.id' => $id,'Retrogenes.suppress' => 0), 'fields' => array ( 'Retrogenes.t_id', 'Retrogenes.id', 'Method.name','Retrogenes.chr','Retrogenes.g_start','Retrogenes.g_end','Retrogenes.strand','Retrogenes.sequence','Retrogenes.ucsc_track','Refseq.sequence','Retrogenes.g_region','Refseq.seqacc','Refseq.version','Retrogenes.sequence','Gene.chr','Gene.g_start','Gene.g_end','Gene.gene_name') ) ) );
#		pr($this->viewVars['retrogenes']);

		#$fp = fopen("/tmp/retroDB2/".$this->Session->id()."gene.fa", 'w'); 

		#fwrite($fp,">retrogene\n".$this->Retrogenes->data['Retrogene']['sequence']."\n");
		#fwrite($fp,">Parental_gene\n".$this->viewVars['retrogenes'][0]['Refseq']['sequence']."\n");
		#$length=0;
		#$seq="";
		#$id="";
		#$temp_out = "";
		#foreach ($this->viewVars['retrogenes'] as $retro):
			#fwrite($fp,">Retrogene_".$retro['Retrogenes']['t_id']."\n".$retro['Retrogenes']['sequence']."\n");
		#	$temp_out .= ">Retrogene_".$retro['Retrogenes']['t_id']."\n".$retro['Retrogenes']['sequence']."\n";
		#	if ( strlen($retro['Refseq']['sequence']) > $length ) {
		#		$length = strlen($retro['Refseq']['sequence']);
		#		$seq = $retro['Refseq']['sequence'];
		#		$id = $retro['Refseq']['seqacc'].".".$retro['Refseq']['version'];
		#	}
		#endforeach;
		#fwrite($fp,">".$id."\n".$seq."\n");
		#$this->set('refseq_seq',">".$id."<br><pre>". wordwrap (strtolower($seq),50,'<br>',true) . "</pre><br>");
		#fwrite($fp,$temp_out);
		#fclose($fp);

		#system("/home/projects/tools/bin/clustalw2 -INFILE=/tmp/retroDB2/".$this->Session->id()."gene.fa -OUTFILE=/tmp/retroDB2/".$this->Session->id()."gene.aln -outorder=INPUT -QUICKTREE > /dev/null");
		
		#$output = "<pre>";
		#$fp = fopen("/tmp/retroDB2/".$this->Session->id()."gene.aln","r");
		#while (!feof($fp)) {
		#	$output .= fgets($fp);
		#}
		#fclose($fp);
		#$output .= "</pre>";
		#$this->set('alignment', $output);
		
		#$ucsc_track_text = "track name=retrogene description=\"Retrogene position track\" color=0,61,76, %0a";
		#foreach ($this->viewVars['retrogenes'] as $retro):
		#	$ucsc_track_text .= $retro['Retrogenes']['chr']."%09".$retro['Retrogenes']['g_start']."%09".$retro['Retrogenes']['g_end']."%09 Retrogene_".$retro['Retrogenes']['t_id']." %0a";
		#endforeach;
		#$ucsc_track_text .= "track name=parental description=\"Parental position track(Blue)\" color=0,61,76, %0a";
		#$ucsc_track_text .= $retro['Gene']['chr']."%09".$retro['Gene']['g_start']."%09".$retro['Gene']['g_end']."%09 ".$retro['Gene']['gene_name']." %0a";
		#$this->set('ucsc_hg_customText', $ucsc_track_text);
	}

}
?>
