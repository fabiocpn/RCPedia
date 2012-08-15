<?php
class Expression extends AppModel {
	var $name = 'Expression';
    var $useTable = 'expression';

	var $belongsTo = array(
		'Retrogene' => array(
			'className' => 'Retrogene',
			'foreignKey' => 'rcp_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
