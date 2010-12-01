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
		$this->set('retro',$this->Retrogenes->find('count',array ('conditions' => array ( 'Retrogenes.specie_id' => $id, 'Refseq.n_exons >' => 1 ), 'joins' => array ( array ( 'table' => 'refseqs', 'alias' => 'Refseq', 'type' => 'inner', 'conditions' => array ('Refseq.id = Retrogenes.refseq_id') ) ) ) ) );
		
		#Load retro_region with the count of retrogene genomic regions
		$this->set('retro_region',$this->Retrogenes->find('count',array ('conditions' => array ( 'Retrogenes.specie_id' => $id, 'Refseq.n_exons >' => 1 ), 'joins' => array ( array ( 'table' => 'refseqs', 'alias' => 'Refseq', 'type' => 'inner', 'conditions' => array ('Refseq.id = Retrogenes.refseq_id') ) ), 'group' => 'Retrogenes.g_region', 'fields' => array ('count(*)','Retrogenes.g_region') ) ) );

	}
}
?>
