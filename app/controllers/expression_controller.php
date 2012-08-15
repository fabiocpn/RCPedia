<?php
class ExpressionController extends AppController {

	var $name = 'Expression';

	function index() {
		$this->Method->recursive = 0;
		$this->set('methods', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'method'));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('method', $this->Method->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Method->create();
			if ($this->Method->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'method'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'method'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'method'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Method->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'method'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'method'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Method->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'method'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Method->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Method'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Method'));
		$this->redirect(array('action' => 'index'));
	}
}
?>
