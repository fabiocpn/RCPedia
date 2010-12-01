<?php
class Refseq extends AppModel {
	var $name = 'Refseq';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Gene' => array(
			'className' => 'Gene',
			'foreignKey' => 'gene_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Retrogene' => array(
			'className' => 'Retrogene',
			'foreignKey' => 'refseq_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>