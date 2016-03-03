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
				'rule' => array('notEmpty'),
				'message' => 'A username is required',
			),
		)
	);


/*
	public $validate = array( //campo que deve ser validado
		'nome' => array( //alias da validação
			'notempty' => array(
				'rule' => 'notBlank', //validação para não aceitar vazio
				'message' => 'Você deve preencher este campo', //erro
			),
		),
	);
	*/
}