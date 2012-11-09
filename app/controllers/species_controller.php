<?php
class SpeciesController extends AppController {

	var $name = 'Species';
	var $uses = array ('Species','Genes','Retrogenes');

	function index() {
		$this->Species->recursive = 0;
		$this->set('species', $this->paginate());
	}

	function view($id = null) {
		if ( !$id ) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'species'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('species', $this->Species->read(null, $id));

		$this->set('genes',$this->Genes->find('count',array ( 'fields' => 'distinct(gene_name)','conditions' => array ( 'Genes.specie_id' => $id ), 'joins' => array ( array ( 'table' => 'refseqs', 'alias' => 'Refseq', 'type' => 'left', 'conditions' => array ( 'Refseq.gene_id = Genes.id') ) ) ) ) );

		#Load retro count 
		$this->set('retro',$this->Retrogenes->find('count',array ('conditions' => array ( 'Retrogenes.specie_id' => $id, 'Refseq.n_exons >' => 1 ), 'joins' => array ( array ( 'table' => 'refseqs', 'alias' => 'Refseq', 'type' => 'left', 'conditions' => array ( 'Refseq.id = Retrogenes.refseq_id') ) ) ) ) );

		$this->set('expressed', $this->Retrogenes->find('count', array ('fields' => 'distinct(Retrogenes.id)', 'conditions' => array ( 'Retrogenes.specie_id' => $id, 'Expression.support >=' => 5 ), 'joins' => array ( array ('table' => 'expression', 'alias' => 'Expression', 'type' => 'left', 'conditions' => array ( 'Retrogenes.id = Expression.rcp_id' ) ) ) ) ) );

		$this->set('tissues', $this->Retrogenes->find('all', array ('fields' => array('Expression.Tissue','count(distinct(Retrogenes.id)) as COUNT_T'), 'conditions' => array ( 'Retrogenes.specie_id' => $id, 'Expression.support >=' => 5 ), 'joins' => array ( array ('table' => 'expression', 'alias' => 'Expression', 'type' => 'left', 'conditions' => array ( 'Retrogenes.id = Expression.rcp_id' ) ) ), 'group' => 'Expression.tissue' ) ) );

	#Load retro_region with the count of retrogene genomic regions
		$this->Retrogenes->unbindModel(array('hasMany' => array('Expression')));
		$this->Retrogenes->unbindModel(array('hasMany' => array('Conservation')));
		$this->Retrogenes->unbindModel(array('belongsTo' => array('TGene')));
		$this->Retrogenes->unbindModel(array('belongsTo' => array('Chr_accession')));
		$this->Retrogenes->unbindModel(array('belongsTo' => array('Method')));
		$this->Retrogenes->unbindModel(array('belongsTo' => array('Specie')));
		$inter = $this->Retrogenes->find('count', Array('conditions' => Array( 'specie_id' => $id,'g_region' => 'Intergenic' )));
		$intrasame = $this->Retrogenes->find('count', Array('conditions' => Array( 'specie_id' => $id,'g_region' => 'Intragenic (same strand)' )));
		$intraoppo = $this->Retrogenes->find('count', Array('conditions' => Array( 'specie_id' => $id,'g_region' => 'Intragenic (opposite strand)' )));
		$this->set('gregion_inter',$inter);
		$this->set('gregion_intrasame',$intrasame);
		$this->set('gregion_intraoppo',$intraoppo);

	}
}
?>
