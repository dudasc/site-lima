<?php

App::uses('AppController', 'Controller');

class ContatosController extends AppController {
	public $components = array('Email');

	public function index() {
		$this->layout = 'paginas';
		if ($this->request->is('POST')) {

			$name = $this->data['Contato']['nome'];
			$from = $this->data['Contato']['email'];
			$subject = 'Contato do Site limamoveissobmedida.com.br';
			$fone = $this->data['Contato']['telefone'];
			$msg = 'Cliente:'.$name.'<br>Telefone: '.$fone . "<br><br>" . $this->data['Contato']['msg'];
		
			$this->Email->sendAs = 'both';
			// html, text, both
			$this->set('conteudo', $msg);
		
			$this->set('from', $name);
			$this->set('msg', $msg);
			$this->Email->to = 'contato@limamoveissobmedida.com.br';
			//$this -> Email -> to = 'eduardoscoelho@hotmail.com';
			$this->Email->subject = $subject;
			$this->Email->replyTo = $from;
			$this->Email->from = $name . '<' . $from . '>';

			if ($this->Email->send($msg)) {
			$this->Session->setFlash('<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Sua mensagem foi enviada com sucesso.
						  </div>', 'default');
			} else {
				$this->Session->setFlash('<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Ocorreu um erro ao enviar a mensagem.
						  </div>', 'default');
				
			}
			$this->redirect($this->referer());
		}
	}
}