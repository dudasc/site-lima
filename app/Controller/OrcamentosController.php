<?php

App::uses('AppController', 'Controller');

class OrcamentosController extends AppController {
	public $components = array('Email');

	public function index() {
		$this->layout = 'paginas';
		$this->set('title_for_layout', 'Orçamento');

		if ($this->request->is('POST')) {

			$name = $this->data['Orcamento']['nome'];
			$from = $this->data['Orcamento']['email'];
			$subject = 'Orcamento do Site limamoveissobmedida.com.br';
			$fone = $this->data['Orcamento']['telefone'];
			$cidade = $this->data['Orcamento']['cidade'];
			$ambiente = $this->data['Orcamento']['ambiente'];
			$msg = '<p>Telefone: '.$fone . "<br>Tipode ambiente:".$ambiente.'</p><br>' . $this->data['Orcamento']['descricao'].'</p>';
			//if (!preg_match("/<([^>]+)>/i", $name) and !preg_match("/<([^>]+)>/i", $from) and
			//	!preg_match("/<([^>]+)>/i", $msg)) {
			$this->Email->sendAs = 'text';
			// html, text, both
			
			// especifica variavel da mensagem para o template
			//$this -> Email -> layout = 'default';
			// views/elements/email/html/contact.ctp
			//$this -> Email -> template = 'default';

			// set view variables as normal
			$this->set('from', $name);
			$this->set('msg', $msg);
			$this->Email->to = 'Orcamento@limamoveissobmedida.com.br';
			//$this -> Email -> to = 'eduardoscoelho@hotmail.com';
			$this->Email->subject = $subject;
			$this->Email->replyTo = $from;
			$this->Email->from = $name . '<' . $from . '>';

			if ($this->Email->send($msg)) {
			$this->Session->setFlash('<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Seu orçamento foi enviado com sucesso! Aguarde que retornaremos o contato.
						  </div>', 'default');
			} else {
				$this->Session->setFlash('<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">
									&times;
								</button>
								Ocorreu um erro ao enviar seu orçamento. Verifique seus dados e tente novamente.
						  </div>', 'default');
				
			}
			$this->redirect($this->referer());
		}

	}
}
