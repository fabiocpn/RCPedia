<?php
class RetrocopiesController extends AppController {

	var $name = 'Retrocopies';
	var $uses = array('Retrogene');

	function search(){
		###############
		#
		# Clean up the session variable if its the first page without search terms
		#
		###############
		#$this->params->named->page
		if( !isset($this->data) && ( $this->params['url']['url'] == "retrocopies/search" || $this->params['url']['url'] == "retrocopies/search/" )  ){
			$this->Session->delete('search_string');
			$this->Session->delete('coord');
			$this->Session->write('is_coord',0);
		}

		###############
		#
		# Store in session variable the search term
		#   This is necessary for the paginator sort work properly
		#
		###############
		if(isset($this->data['Retrocopies']['search_string'])) {
			if ( preg_match("/^chr[0-9]/",$this->data['Retrocopies']['search_string']) || preg_match("/^CHR[0-9]/",$this->data['Retrocopies']['search_string']) ) {
				$array = preg_split("/[:|-\s]+/", $this->data['Retrocopies']['search_string']);
				if ( isset($array[0]) ) { 
					$t_coord['chr']   = preg_replace("/,/","",$array[0]); 
				}
				if ( isset($array[1]) ) { 
					$t_coord['start'] = preg_replace("/,/","",$array[1]); 
				}
				if ( isset($array[2]) ) { 
					$t_coord['end']  = preg_replace("/,/","",$array[2]); 
				}

				$this->Session->write('coord',$t_coord);
				$this->Session->write('is_coord',1);
	
			}
			else {
				$this->Session->write('is_coord',0);
			}
			$this->Session->write('search_string',$this->data['Retrocopies']['search_string']);
			$this->Session->write('specie_id',$this->data['Retrocopies']['specie_id']);
		}

		###############
		#
		# Setup search variables
		#
		###############
		$string = $this->Session->read('search_string');
		$specie_id = $this->Session->read('specie_id');
		#$string = $this->data['Retrocopies']['search_string'];
		#$specie_id = $this->data['Retrocopies']['specie_id'];


		#if ( isset($this->data['Retrogenes']['specie_id']) ) {
		#	$specie_id = $this->data['Retrogenes']['specie_id'];
		#} else {
		#	$specie_id = 1;
		#}

		###############
		#
		# Seach for the string on this order:
		#   - RetrogeneID 					(exact match)
		#	- EnsemblID	|| UCSC_ID			(exact match)	
		#	- Gene_name						(exact match)	
		#	- Gene Name || Aliases		 	(match)	
		#	- FullName						(match)
		#
		###############
		if ( isset($string) ) {
			if ( ! $this->Session->read('is_coord') ) {
				$this->paginate = array ( 'order' => 'Gene.gene_name' );
				$this->paginate = array ( 'limit' => 50 );
				################################
				#
				# Search_string eq RCP_name(t_id)
				#
				################################
				$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id, 'Refseq.n_exons >' => 1,'Retrogene.t_id' => $string,'Retrogene.suppress' => 0)));
				if ( count($this->viewVars['retrogenes']) == 0 ) {

					################################
					#
					# Search_string eq ( NCBI_id or ENSEMBL_id )
					#
					################################
					#$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Retrogene.suppress' => 0,'Refseq.n_exons >' => 1,array ('OR' => array('Gene.Ensembl_id' => $string, 'Gene.ncbi_id' => $string)))));
					if ( count($this->viewVars['retrogenes']) == 0 ) {
						################################
						#
						# Search_string eq Geme_name
						#
						################################

						#Is there any gene with exact gene_name match? 
						$this->set('gene', $this->paginate('Gene', Array( 'Gene.specie_id' => $specie_id, 'Gene.gene_name' => $string )));
						if ( count($this->viewVars['gene']) == 0 ) {
							$this->set('gene_name_match', 0);
						}
						else {
							$this->set('gene_name_match', 1);
						}
						#pr($this->viewVars['retrogenes']);

						$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Retrogene.suppress' => 0,'Refseq.n_exons >' => 1, array ( 'AND' => array('Gene.gene_name' => $string)))));

						if ( count($this->viewVars['retrogenes']) == 0 && $this->viewVars['gene_name_match'] == 1 ) {
								$this->Session->setFlash(sprintf(__('There is no retrocopies for Parental Gene "%s"', true), $string));
								#$this->redirect(array('action' => 'search'));
						}
						else {
							if ( count($this->viewVars['retrogenes']) == 0 ) {
								$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1,'Retrogene.suppress' => 0, array ( 'OR' => array('Gene.gene_name LIKE' => "%".$string."%",'Gene.synonims LIKE' => "%".$string."%")))));
								if ( count($this->viewVars['retrogenes']) == 0 ) {
									$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1,'Retrogene.suppress' => 0, 'Gene.gene_oficial_name LIKE' => "%".$string."%")));
									if ( count($this->viewVars['retrogenes']) == 0  ) {
										$this->Session->setFlash(sprintf(__('There is no retrocopies for "%s"', true), $string));
										#$this->redirect(array('action' => 'search'));
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
					$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1, 'Retrogene.chr' => $t_coord['chr'], 'Retrogene.g_start >=' => $t_coord['start'], 'Retrogene.g_end <=' => $t_coord['end'])));
				}
				else {
					if ( !isset($t_coord['start']) && !isset($t_coord['end']) ) {
						$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.specie_id' => $specie_id,'Refseq.n_exons >' => 1, 'Retrogene.chr' => $t_coord['chr'])));
					}	
					else {
						$this->Session->setFlash("Invalid Search");
						#$this->redirect(array('action' => 'search'));
					}
				}
			}
		}
		else {
			$this->set('retrogenes', $this->paginate('Retrogene', Array('Retrogene.id' => 0)));
		}
	}

	function view($id = null) {
		
    	$this->set('title_for_layout', 'Retrocopy');    

		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'retrocopy'));
			#$this->redirect(array('action' => 'index'));
		}

		$this->set('retrogene', $this->Retrogene->read(null, $id));
		#$this->Retrogene->recursive = 2;
		#$retrogene = $this->Retrogene->find('first', array('conditions' => array('Retrogene.id' => $id)));
		#$this->set(compact('retrogene'));
		#pr($this->Retrogene);


		###########################################
		#
		# Conservation view assembly
		#
		###########################################
		$cons_output = "";
		$species = array('Hs','Pt','Gg','Pa','Rm','Cj');
		foreach ( $species as $specie ):
			$buffer = "";
			$conserved = 0;
			foreach ( $this->Retrogene->data['Conservation'] as $cons ):
				$cons_rcp = $this->Retrogene->find('first', array('conditions' => array('Retrogene.id' => $cons['rcp_id2'])));

				if ( $cons_rcp['Specie']['abreviation'] == "$specie" ):
					$conserved = 1;
					$buffer = $cons_rcp;
				endif;
	
			endforeach;
			if ( $conserved == 1):
				$cons_output .= '<tr><td><a href=/rcpedia/retrocopies/view/'.$buffer['Retrogene']['id'].'><img src="/rcpedia/img/'.$specie.'_on.jpg" width="250" alt="" target="_blank"/></a></td></tr>';
			else:
				$cons_output .= '<tr><td><img src="/rcpedia/img/'.$specie.'_off.jpg" width="250" alt="" /></td></tr>';
			endif;
		endforeach;
		$cons_output .= "";
		$this->set('conserved',$cons_output);


		###########################################
		#
		# Multiple Alignment
		#   - Update: Multiple alignment is now done off-line
		###########################################
#		$fp = fopen("/tmp/retroDB2/".$this->Session->id().".fa", 'w'); 
#
#		fwrite($fp,">".$this->Retrogene->data['Refseq']['seqacc']."\n".$this->Retrogene->data['Refseq']['sequence']."\n");
#		fwrite($fp,">".$this->Retrogene->data['Retrogene']['t_id']."\n".$this->Retrogene->data['Retrogene']['sequence']."\n");
#		fclose($fp);
#
#		system("/home/projects/tools/bin/clustalw2 -INFILE=/tmp/retroDB2/".$this->Session->id().".fa -OUTFILE=/tmp/retroDB2/".$this->Session->id().".aln -outorder=INPUT -QUICKTREE > /dev/null");
#		
#		$output = "<pre>";
#		$fp = fopen("/tmp/retroDB2/".$this->Session->id().".aln","r");
#		while (!feof($fp)) {
#			$output .= fgets($fp);
#		}
#		fclose($fp);
#		$output .= "</pre>";
#		$this->set('alignment', $output);
#
		
		###########################################
		#
		# UCSC track
		#   - Update: Multiple alignment is now done off-line
		###########################################
		#$pos_start = $this->Retrogene->data['Retrogene']['g_start']-500;
		#$pos_end = $this->Retrogene->data['Retrogene']['g_end']+500;
		#$ucsc_track_text =  "browser position ".$this->Retrogene->data['Retrogene']['chr'].":".$pos_start."-".$pos_end." %0a";
		#$ucsc_track_text .= "track name=retrogene description=\"Retrogene position track\" color=0,61,76, %0a";
		#$ucsc_track_text .= $this->Retrogene->data['Retrogene']['chr']."%09".$this->Retrogene->data['Retrogene']['g_start']."%09".$this->Retrogene->data['Retrogene']['g_end']."%09 Retrogene_".$this->Retrogene->data['Retrogene']['t_id']." %0a";
		#$this->set('ucsc_hg_customText', $ucsc_track_text);

	}
}
?>
