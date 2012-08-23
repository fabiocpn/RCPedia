<?php
class Conservation extends AppModel {
	var $name = 'Conservation';
    var $useTable = 'conservation';

	var $belongsTo = array(
		'Retrogene' => array(
			'className' => 'Retrogene',
			'foreignKey' => 'rcp_id1',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Retrogene' => array(
			'className' => 'Retrogene',
			'foreignKey' => 'rcp_id2',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>
