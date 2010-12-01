<?php
class RetrogenesController extends AppController {

	var $name = 'Retrogenes';

	function index() {
		$this->Retrogene->recursive = 0;
		$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.n_exons >' => 1)));
	}

	function searchbyspecie($specie = null) {
		$this->Retrogene->recursive = 0;
		$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.n_exons >' => 1,'Specie.name like' => "%$specie%")));
	}

	function index_debug() {
		$this->Retrogene->recursive = 0;
		$this->set('retrogenes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'retrogene'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('retrogene', $this->Retrogene->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Retrogene->create();
			if ($this->Retrogene->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'retrogene'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'retrogene'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'retrogene'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Retrogene->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'retrogene'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'retrogene'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Retrogene->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'retrogene'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Retrogene->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Retrogene'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Retrogene'));
		$this->redirect(array('action' => 'index'));
	}
}
?>
