<?php
class Orcamento extends AppModel {
	//public $name = 'Orcamento';
	public $useTable = false;
	
	var $uses = false;

	public $validate = array(
		'nome' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Informe seu nome',
			)
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
		'cidade' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Informe sua cidade.',
				)
		),
		'telefone' => array(
			'notempty' => array(
				'rule' => 'notEmpty',
				'message' => 'Informe seu telefone.'
			)
		),
		'ambiente' => array(
			'notempty' => array(
				'rule' => 'notEmpty',
				'message' => 'Selecione o ambiente.'
			)
		),
		'descricao' => array(
			'rule' => 'notEmpty',
			'message' => 'Campo descrição não pode estar em branco',
		),
	);
}