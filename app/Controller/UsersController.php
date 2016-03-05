<?php
class UsersController extends AppController {
	public $name = 'Users';

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('admin');
	}

	public function index() {
		$this->redirect($this->login());
	}

	public function login() {
		$this->layout = 'login';

		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {

				$this->Session->setFlash(__('<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Usuário ou senha incorretos.
						  </div>'));
			}
		}
	}

	public function admin_index() {
		$this->layout = 'painel';
		//Pegando o usuario da sessão
		$this->User->id = $this->Auth->User('id');
		$this->set('usuario', $this->User->read());
	}

	public function admin_logout() {
		$this->Session->setFlash(__('<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Deslogado com sucesso.
						  </div>'), 'default');
		$this->redirect($this->Auth->logout());
	}

	public function admin_edit($id = null) {
		$this->layout = 'painel';
		$this->User->id = $this->Auth->User('id');

		if ($this->request->is('get')) {
			$this->request->data = $this->User->read();

		} else {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Dados salvos com sucesso.
						  </div>'), 'default');
				//$this->redirect('admin_index');
				//$this->redirect($this->referer());
			}
		}		
	}

	public function recuperarSenha(){
		$this->layout = 'painel';
		if($this->request->is('post')){
			$email = $this->data['User']['email'];

			$opcoes = array(
                'conditions' => array('email =' => $email)
            );
            $res = $this->User->find('all', $opcoes);

            if($res){
				$this->Session->setFlash(__('<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Função indisponível no momento.
						  </div>'));
            }else{
            	$this->Session->setFlash(__('<div class="alert alert-warning">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Função indisponível no momento.
						  </div>'));
            }
            $this->redirect('login');
		}
	}
}
?>