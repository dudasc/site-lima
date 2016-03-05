<?php
class Ambiente extends AppModel {
	public $hasMany = array(
		'FotoAmbiente' => array(
			'className' => 'FotoAmbiente',
			'foreignKey' => 'ambientes_id',
			//'fields' => array('id', 'nome', 'albuns_id'),
			'conditions' => array(),
			'order' => array('id' => 'DESC'),
			'dependent' => true,
		),
	);

	public $validate = array(
		'id',
		'nome' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'A username is required',
			),
			'caracteres' => array(
		    	'rule' => array('minLength', 2),
		      	'message' => 'Deve conter no mínimo 2 caracteres',
		    )			
		)
	);
}