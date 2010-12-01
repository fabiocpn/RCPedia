<?php
class GenesController extends AppController {

	var $name = 'Genes';
	var $uses = array ('Gene','Refseqs','Retrogenes');

	function index() {
		$this->Gene->recursive = 0;
		$this->set('genes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'gene'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gene', $this->Gene->read(null, $id));
		$this->set('retrogenes', $this->Retrogenes->find('all',array ( 'order' => 'Retrogenes.ident','joins' => array ( array ('table' => 'refseqs', 'alias' => 'Refseq', 'type' => 'inner', 'conditions' => array('Retrogenes.refseq_id = Refseq.id') ), array ( 'table' => 'genes', 'alias' => 'Gene', 'type' => 'inner', 'conditions' => array ( 'Refseq.gene_id = Gene.id') ) ), 'conditions' => array ( 'Gene.id' => $id) ) ) );
	}

}
?>
