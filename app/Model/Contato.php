<?php
class Contato extends AppModel {
	public $name = 'Contato';
	public $useTable = false;

	public $validate = array(
		'nome' => array(
			'rule' => 'notEmpty',
			'message' => 'Campo de preenchimento obrigatório',
		),
		'email' => array(
			'valido' => array(
				'rule' => 'email',
				'message' => 'Informe um email válido',
			),
			'obrigatorio' => array(
				'rule' => 'notEmpty',
				'message' => 'Campo de preenchimento obrigatório',
			),
		),
		'telefone',

		'msg' => array(
			'rule' => 'notEmpty',
			'message' => 'Campo de preenchimento obrigatório',
		),
	);
}