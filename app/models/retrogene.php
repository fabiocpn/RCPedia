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
		)
	);
}
?>
