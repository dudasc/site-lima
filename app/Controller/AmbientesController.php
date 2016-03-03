<?php

App::uses('AppController', 'Controller');

class AmbientesController extends AppController {
	public $uses = array('Ambiente', 'FotoAmbiente');

	public function index($id = null) {
		$this->layout = 'paginas';

		//quando seleciona um ambiente
		if ($this->request->is('GET')) {
			$this->Ambiente->id = $id;
			$ambiente = $this->Ambiente->read();
			$this->set('ambiente', $ambiente);

			//consulta as fotos do ambiente
			//$options = array('join' => 'left', 'conditions' => array('Ambiente.id =' => $id));
			//$fotos = $this->FotoAmbiente->find('all', $options);
			//$this->set('fotos', $fotos);
		}
		//mostra o menu lateral com os ambiente
		$opcoes = array('order' => array('nome' => 'ASC'));
		$ambientes = $this->Ambiente->find('all', $opcoes);
		$this->set('ambientes', $ambientes);		
	}

	public function admin_index() {
		$this->layout = 'painel';

		$opcoes = array('order' => array('id' => 'DESC'));
		$ambientes = $this->Ambiente->find('all', $opcoes);
		//$ambientes = $this->Ambiente->query('SELECT * FROM ambientes ');
		$this->set('ambientes', $ambientes);
	}

	public function admin_add($id = null) {
		$this->layout = 'painel';

		if ($id != null) {
			$this->Ambiente->id = $id;
			if ($this->request->is('get')) {

				$this->request->data = $this->Ambiente->read();
			} else {
				if ($this->Ambiente->save($this->request->data)) {
					$this->Session->setFlash('<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Dados salvos com sucesso.
						  </div>', 'default');

				} else {
					$this->Session->setFlash('<div class="alert alert-warning">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Erro ao salvar dados.
						  </div>', 'default');
				}
				$this->redirect($this->referer());
			}
		} else {
			if ($this->request->is('post')) {
				$this->Ambiente->set(array(
					//'data' => date("Y-m-d")
				));
				if ($this->Ambiente->save($this->data)) {
					$this->Session->setFlash('<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Dados cadastrados com sucesso.
				  	</div></p>');
				} else {
					$this->Session->setFlash('<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Erro ao cadastrar dados.
				  	</div>');
				}
				$this->redirect($this->referer());
			}
		}
	}

	public function admin_fotos($id = null) {
		$this->layout = 'painel';
		//$options = array('order' => array('FotoAmbiente.id' => 'DESC'), 'conditions' => array('ambientes_id =' => $id));
		//$fotos = $this->Foto->find('all', $options);

		//$ambientes = $this->FotoAmbiente->find('all');
		//$ambientes = $this->Ambiente->query('SELECT * FROM ambientes ');
		//$this->set('ambientes', $ambientes);

		$this->Ambiente->id = $id;
		if ($this->request->is('get')) {
			//$fotos = $this->FotoAmbiente->find('all');
			//$this->set('fotos', $fotos);
			$this->request->data = $ambientes = $this->Ambiente->read();

			$options = array('conditions' => array('Ambiente.id =' => $id));
			$fotos = $this->FotoAmbiente->find('all', $options);
			$this->set('fotos', $fotos);

		} else {
			if ($this->Ambiente->save($this->request->data)) {
				$this->Session->setFlash('<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Ambiente salvo com sucesso.
						  </div>', 'default');

			} else {
				$this->Session->setFlash('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Erro ao salvar ambiente.
						  </div>', 'default');
			}
			$this->redirect($this->referer());
		}
	}

	public function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('ID inválido para %s.', true)));
			//$this->redirect(array('action' => 'index'));
		}
		if ($this->Ambiente->delete($id)) {
			$this->Session->setFlash('<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Ambiente excluído com sucesso.
						  </div>');
		} else {
			$this->Session->setFlash('<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Erro excluir.
						  </div>');
		}
		$this->redirect($this->referer());
	}

}
