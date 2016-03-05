<?php
class User extends AppModel {
	//public $name = 'User';

	public $validate = array(
		'id',
		'username' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A username is required',
			),

			'isUnique' => array(
				'rule' => array('isUnique', true),
				'message' => 'Este nome de usuário já existe',
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo senha nao pode estar em branco.',
			),

			'password_confirm' => array(
				'rule' => 'confirmaSenha',
				'message' => 'Senhas não conferem.',
			),
		),

		'email' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Campo obrigatório',
			),

			'isUnique' => array(
				'rule' => array('isUnique', true),
				'message' => 'Este e-mail de usuário já existe',
			),
		),
	);

	public function confirmaSenha($data) {
		if ($data['password'] == $this->data['User']['password_confirm']) {
			return true;
		}
		return false;
	}

	public function confirma($data) {
		if ($data['password'] == $this->Auth->User('password')) {
			return true;
		}
		return false;
	}

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}
}
?>