<?php

App::uses('AppController', 'Controller');

class FotoAmbientesController extends AppController {
	public $name = 'Fotoambientes';

	public function admin_add() {

		if ($this->request->is('post')) {
			//$this->request->data['FotoAmbiente']['noUpload'] = false;
			//echo die(print_r($this->data));
			if ($this->FotoAmbiente->save($this->data)) {
				$this->Session->setFlash('<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Foto cadastrada com sucesso.
				</div></p>');
			} else {
				$this->Session->setFlash('<div class="alert alert-warning">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Erro ao cadastrar foto.
				</div>');
			}
			$this->redirect($this->referer());
		}
	}

	public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('ID inválido para %s.', true)));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->FotoAmbiente->delete($id)) {
            $this->Session->setFlash('<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Foto excluída com sucesso. 
						  </div>');
        }else{
        	$this->Session->setFlash('<div class="alert alert-error">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Erro excluir foto. 
						  </div>');
		}
		 $this->redirect($this->referer());
    }
	
	
	public function ver($id = null) {
		$options = array('order' => array('Foto.id' => 'DESC'), 'conditions' => array('albuns_id =' => $id));
		$fotos = $this->Foto->find('all', $options);
        $this->set('fotos', $fotos);		
	} 

}
