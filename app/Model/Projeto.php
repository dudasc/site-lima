<?php
class Projeto extends AppModel {
	public $hasMany = array(
		'FotoProjeto' => array(
			'className' => 'FotoProjeto',
			'foreignKey' => 'projetos_id',
			//'fields' => array('id', 'nome', 'albuns_id'),
			//'conditions' => array(),
			'order' => array('id' => 'DESC'),
			'dependent' => true,
		),
	);

		public $validate = array(
		'id',
		'nome' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo nome é obrigatório',
			),
		),
		'descricao' 
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