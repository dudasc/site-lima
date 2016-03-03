<?php

App::uses('AppController', 'Controller');

class ProjetosController extends AppController {
	public $uses = array('Projeto', 'FotoProjeto');
	
	public function index() {
		$this->layout = 'paginas';
		$opcoes = array('fields' => array('id', 'nome', 'substring(`Projeto`.`descricao`,1, 200) as "descricao"'), 
		'order' => array('id' => 'DESC'), 'limit' => 4);
		//$projetos = $this->Projeto->find('all', $opcoes);
		$this->paginate = $opcoes;
		$projetos = $this->paginate();
        $this->set('projetos', $projetos);
	}

	public function admin_index() {
		$this->layout = 'painel';

		$opcoes = array('type' => 'inner', 'order' => array('id' => 'DESC'));
		$projetos = $this->Projeto->find('all', $opcoes);
		//$Projetos = $this->Projeto->query('SELECT * FROM Projetos ');
		$this->set('projetos', $projetos);
	}

	public function admin_add($id = null) {
		$this->layout = 'painel';

		if ($id != null) {
			$this->Projeto->id = $id;
			if ($this->request->is('get')) {

				$this->request->data = $this->Projeto->read();
			} else {
				if ($this->Projeto->save($this->request->data)) {
					$this->Session->setFlash('<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Dados salvos com sucesso.
						  </div>', 'default');

				} else {
					$this->Session->setFlash('<div class="alert alert-danger">
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
				$this->Projeto->set(array(
					//'data' => date("Y-m-d")
				));
				if ($this->Projeto->save($this->data)) {
					$this->Session->setFlash('<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Dados cadastrados com sucesso.
				  	</div></p>');
				} else {
					$this->Session->setFlash('<div class="alert alert-danger">
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
		//$options = array('order' => array('FotoProjeto.id' => 'DESC'), 'conditions' => array('Projetos_id =' => $id));
		//$fotos = $this->Foto->find('all', $options);

		//$Projetos = $this->FotoProjeto->find('all');
		//$Projetos = $this->Projeto->query('SELECT * FROM Projetos ');
		//$this->set('Projetos', $Projetos);

		$this->Projeto->id = $id;
		if ($this->request->is('get')) {
			//$fotos = $this->FotoProjeto->find('all');
			//$this->set('fotos', $fotos);
			$this->request->data =  $this->Projeto->read();

			$options = array('join' => 'inner', 'conditions' => array('Projeto.id =' => $id));
			$fotos = $this->FotoProjeto->find('all', $options);
			$this->set('fotos', $fotos);

		} else {
			if ($this->Projeto->save($this->request->data)) {
				$this->Session->setFlash('<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Projeto salvo com sucesso.
						  </div>', 'default');

			} else {
				$this->Session->setFlash('<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Erro ao salvar Projeto.
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
		if ($this->Projeto->delete($id)) {
			$this->Session->setFlash('<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Projeto excluído com sucesso.
						  </div>');
		} else {
			$this->Session->setFlash('<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Erro excluir.
						  </div>');
		}
		$this->redirect($this->referer());
	}

	public function ver($id = null){
		$this->layout = 'paginas';
		$this->Projeto->id = $id;
		if ($this->request->is('get')) {

			$this->request->data = $this->Projeto->read();
			$this->set('projeto', $this->request->data);
		}
	}
}
