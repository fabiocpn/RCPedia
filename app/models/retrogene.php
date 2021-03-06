<?php
class Retrogene extends AppModel {
	var $name = 'Retrogene';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Specie' => array(
			'className' => 'Specie',
			'foreignKey' => 'specie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Refseq' => array(
			'className' => 'Refseq',
			'foreignKey' => 'refseq_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Method' => array(
			'className' => 'Method',
			'foreignKey' => 'method_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Gene' => array(
			'className' => 'Gene',
			'foreignKey' => false,#'Refseq.gene_id',
			'conditions' => 'Refseq.gene_id = Gene.id',
			'fields' => '',
			'order' => ''
		),
		'TGene' => array(
			'className' => 'Gene',
			'foreignKey' => 'target_gene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Chr_accession' => array(
			'className' => 'Chr_accession',
			'foreignKey' => false,
			'conditions' => 'Chr_accession.chr = Retrogene.chr and Chr_accession.specie_id = Retrogene.specie_id'
		)
	);

	var $hasMany = array(
		'Expression' => array (
			'className' => 'Expression',
			'foreignKey' => 'rcp_id'
		),
		'Conservation' => array (
			'className' => 'Conservation',
			'foreignKey' => 'rcp_id1'
		)
	
	);
	
#    var $last_custom_sql_count = 0;

    function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
	    $count = $this->last_custom_sql_count;
        return $count;
     }

}
?>
