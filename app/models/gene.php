<?php
class Gene extends AppModel {
	var $name = 'Gene';
	var $primaryKey = 'Id';
	var $displayField = 'Id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Specie' => array(
			'className' => 'Specie',
			'foreignKey' => 'specie_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Refseq' => array(
			'className' => 'Refseq',
			'foreignKey' => 'gene_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	
		#'Retrogene' => array(
		#	'className' => 'Retrogene',
		#	'conditions' => 'Refseq.id = Retrogene.refseq_id',
		#	'fields' => ''	
		#)
	);

}
?>
