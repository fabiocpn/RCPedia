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

	function searchbycoord() {
		if(!isset($this->data) && $this->params['url']['url'] == "retrogenes/searchbycoord" ){
			$this->Session->delete('coord');
		} 
		if(isset($this->data['Retrogenes']['coord_q'])) {
			$array = preg_split("/:|-/", $this->data['Retrogenes']['coord_q']);

			if ( !preg_match("/^chr/",$array[0]) ) {
				#$this->Session->setFlash(sprintf(__('Invalid Seach', true), 'retrogene'));
				$this->Session->setFlash("Invalid Search");
				$this->redirect(array('action' => 'searchbycoord'));
			}

			if ( isset($array[0]) ) { 
				$t_coord['chr']   = $array[0]; 
			}
			if ( isset($array[1]) ) { 
				$t_coord['start'] = $array[1]; 
			}
			if ( isset($array[2]) ) { 
				$t_coord['end']  = $array[2]; 
			}

			$this->Session->write('coord',$t_coord);
	
		}
		$t_coord = $this->Session->read('coord');
			if ( isset($t_coord['start']) && isset($t_coord['end']) ) { 
					$this->paginate = array ( 'order' => 'Retrogene.g_start' );
					$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.n_exons >' => 1, 'Retrogene.chr' => $t_coord['chr'], 'Retrogene.g_start >=' => $t_coord['start'], 'Retrogene.g_end <=' => $t_coord['end'])));
			}
			else {
				if ( !isset($t_coord['start']) && !isset($t_coord['end']) ) {
					$this->paginate = array ( 'order' => 'Retrogene.g_start' );
					$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.n_exons >' => 1, 'Retrogene.chr' => $t_coord['chr'])));
				
				}	
				else {
					$this->Session->setFlash("Invalid Search");
					$this->redirect(array('action' => 'searchbycoord'));
				}
			}
		#$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.n_exons >' => 1, 'Retrogene.chr' => $this->Session->read('coord')['chr'] )));
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

}
?>
