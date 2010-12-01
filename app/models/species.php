<?php
class Species extends AppModel {
	var $name = 'Species';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Retrogenes' => array(
			'className' => 'Retrogenes',
			'foreignKey' => 'specie_id',
			'dependent' => false,
			'tables' => 'refseqs',
			'conditions' => '',
			'fields' => 'id',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Genes' => array(
			'className' => 'Genes',
			'foreignKey' => 'specie_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => 'distinct(gene_name)',
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
