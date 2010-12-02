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

	function search(){
		###############
		#
		# Clean up the session variable if its the first page without search terms
		#
		###############
		if(!isset($this->data) && ( $this->params['url']['url'] == "retrogenes/search" || $this->params['url']['url'] == "retrogenes/search/" ) ){
			$this->Session->delete('search_string');
		}

		###############
		#
		# Store in session variable the search term
		#   This is necessary for the paginator sort work properly
		#
		###############
		if(isset($this->data['Retrogenes']['search_string'])) {
			if ( preg_match("/^chr/",$this->data['Retrogenes']['search_string']) || preg_match("/^CHR/",$this->data['Retrogenes']['search_string']) ) {
				$seach_coord = 1;
				$array = preg_split("/:|-/", $this->data['Retrogenes']['search_string']);

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
			else {
				$seach_coord = 0;
			}
			$this->Session->write('search_string',$this->data['Retrogenes']['search_string']);
		}

		###############
		#
		# Setup search variables
		#
		###############
		$string = $this->Session->read('search_string');

		if ( isset($this->data['Retrogenes']['specie_id']) ) {
			$specie_id = $this->data['Retrogenes']['specie_id'];
		} else {
			$specie_id = 1;
		}

		###############
		#
		# Seach for the string on this order:
		#   - RetrogeneID 					(exact match)
		#	- EnsemblID	  					(exact match)	
		#	- NCBIID      					(exact match)
		#	- Retrogene_id || Gene Name 	(match)	
		#	- Aliases						(match)
		#	- FullName						(match)
		#
		###############
		if ( isset($string) ) {
			if ( !isset($seach_coord) || $seach_coord == 0 ) {
				$this->paginate = array ( 'order' => 'Gene.gene_name' );
				$this->paginate = array ( 'limit' => 50 );
				$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id, 'Refseq.n_exons >' => 1,'Retrogene.t_id' => $string)));
				if ( count($this->viewVars['retrogenes']) == 0 ) {
					$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1,'Gene.Ensembl_id' => $string)));
					if ( count($this->viewVars['retrogenes']) == 0 ) {
						$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1,'Gene.ncbi_id' => $string)));
						if ( count($this->viewVars['retrogenes']) == 0 ) {
							$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1, array ( 'OR' => array('Retrogene.t_id LIKE' => "%".$string."%",'Gene.gene_name LIKE' => "%".$string."%")))));
							if ( count($this->viewVars['retrogenes']) == 0 ) {
								$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1, 'Gene.synonims LIKE' => "%".$string."%")));
								if ( count($this->viewVars['retrogenes']) == 0 ) {
									$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1, 'Gene.gene_oficial_name LIKE' => "%".$string."%")));
									if ( count($this->viewVars['retrogenes']) == 0 ) {
										$this->Session->setFlash(sprintf(__('No Retrogens were found using the term: %s', true), $string));
										$this->redirect(array('action' => 'search'));
									}
								}	
							}
						}
					}	
				}
			}
		###############
		#
		# This is a coord search
		#
		###############
			else {
				$t_coord = $this->Session->read('coord');
				$this->paginate = array ( 'limit' => 20 );
				$this->paginate = array ( 'order' => 'Retrogene.g_start' );
				if ( isset($t_coord['start']) && isset($t_coord['end']) ) { 
					$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.n_exons >' => 1, 'Retrogene.chr' => $t_coord['chr'], 'Retrogene.g_start >=' => $t_coord['start'], 'Retrogene.g_end <=' => $t_coord['end'])));
				}
				else {
					if ( !isset($t_coord['start']) && !isset($t_coord['end']) ) {
						$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.n_exons >' => 1, 'Retrogene.chr' => $t_coord['chr'])));
					}	
					else {
						$this->Session->setFlash("Invalid Search");
						$this->redirect(array('action' => 'searchbycoord'));
					}
				}
			}
		}
		else {
			$this->set('retrogenes', $this->paginate('Retrogene', Array('Refseq.id' => 0)));
		}
	}

	function searchbycoord() {
		if(!isset($this->data) && ( $this->params['url']['url'] == "retrogenes/searchbycoord" || $this->params['url']['url'] == "retrogenes/searchbycoord/" ) ){
			$this->Session->delete('coord');
		} 
		if(isset($this->data['Retrogenes']['coord_q'])) {
			$array = preg_split("/:|-/", $this->data['Retrogenes']['coord_q']);

			if ( !preg_match("/^chr/",$array[0]) || !preg_match("/^CHR/",$array[0]) ) {
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
