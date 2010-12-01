<?php
class RefseqsController extends AppController {

	var $name = 'Refseqs';

	function index() {
		$this->Refseq->recursive = 0;
		$this->set('refseqs', $this->paginate('Refseq',Array('Refseq.n_exons >' => 1)));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'refseq'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('refseq', $this->Refseq->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Refseq->create();
			if ($this->Refseq->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'refseq'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'refseq'));
			}
		}
		$genes = $this->Refseq->Gene->find('list');
		$this->set(compact('genes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'refseq'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Refseq->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'refseq'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'refseq'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Refseq->read(null, $id);
		}
		$genes = $this->Refseq->Gene->find('list');
		$this->set(compact('genes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'refseq'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Refseq->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Refseq'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Refseq'));
		$this->redirect(array('action' => 'index'));
	}
}
?>
