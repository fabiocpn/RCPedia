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
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'gene'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gene', $this->Gene->read(null, $id));
		$this->set('retrogenes', $this->Retrogenes->find('all',array ( 'order' => 'Retrogenes.ident','joins' => array ( array ('table' => 'refseqs', 'alias' => 'Refseq', 'type' => 'inner', 'conditions' => array('Retrogenes.refseq_id = Refseq.id') ), array ( 'table' => 'genes', 'alias' => 'Gene', 'type' => 'inner', 'conditions' => array ( 'Refseq.gene_id = Gene.id') ) ), 'conditions' => array ( 'Gene.id' => $id) ) ) );
	}

}
?>
